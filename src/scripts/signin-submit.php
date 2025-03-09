<?php

// Verifica se veio por um post
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: index.php?rota=signin');
    $_SESSION['error'] = "Isso não é um POST";
    exit;
}

// Busca os dados do POST;
$usuario = $_POST['text-usuario'] ?? null;
$senha = $_POST['text-senha'] ?? null;
$senhaRepetida = $_POST['text-senha-repetida'] ?? null;

// Verifica se os dados estão preenchidos
if (empty($usuario) || empty($senha) || empty($senhaRepetida)) {
    header('location: index.php?rota=signin');
    $_SESSION['error'] = 'Preencha todos os dados';
    exit;
}

// Verifica se a senha é a mesma em ambos os campos
if ($senha !== $senhaRepetida) {
    header('location: index.php?rota=signin');
    $_SESSION['error'] = 'As senhas não correspondem';
    exit;
}

// O banco de dados já está carregado no index.php
$database = new Database();

// Prepara a query para ver o usuário já existe
$params = [
    ':usuario' => $usuario
];
$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
$result = $database->query($sql, $params);

// Verifica se ocorreu algum erro
if ($result['status'] === 'err') {
    header('location: index.php?rota=404');
    $_SESSION['error'] = $result['status']; // usado no debug
    exit;
}

// Verifica se o usuário já existe
if ($result['data']) {
    header('location: index.php?rota=signin');
    $_SESSION['error'] = 'Nome de usuário já em uso, escolha outro';
    exit;
}

// Converte a senha para o formato HASH
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Cadastra o usuário no banco de dados
$params['senha'] = $senhaHash;
$sql = "INSERT INTO usuarios(usuario, senha) VALUES (:usuario, :senha)";
$result = $database->query($sql, $params);

// Verifica se ocorreu algum erro
if ($result['status'] === 'err') {
    header('location: index.php?rota=404');
    $_SESSION['error'] = $result['status']; // usado no debug
    exit;
}

// Redireciona para a tela de login
header('location: index.php?rota=login');