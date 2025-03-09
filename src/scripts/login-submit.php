<?php

// Verifica se veio por um Post
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: index.php?rota=login');
    $_SESSION['error'] = 'Não é um POST';
    exit;
}

// Vai Buscar os dados do Post
$usuario = $_POST['text-usuario'] ?? null;
$senha = $_POST['text-senha'] ?? null;

// Verifica se os dados estão preenchidos
if (empty($usuario) || empty($senha)) {
    header('location: index.php?rota=login');
    $_SESSION['error'] = 'Dados não preenchidos';
    exit;
}

// O banco de dados já está carregado no index.php
$database = new Database();

// os : é usado para evitar codigos maliciosos
$params = [
    ':usuario' => $usuario
];
$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
$result = $database->query($sql, $params);

// Verifica se aconteceu um erro
if ($result['status'] === 'err') {
    header('location: index.php?rota=login');
    exit;
}

// Verifica se o usuário existe ou não
if ($result['data'] === 0) {
    $_SESSION['error'] = 'Usuário ou senha inválidos';
    header('location: index.php?rota=login');
    exit;
}

// Verifica se o usuário existe, mas a senha não corresponde
if (!password_verify($senha, $result['data'][0]->senha)) {
    $_SESSION['error'] = 'Usuário ou senha inválidos';
    header('location: index.php?rota=login');
    exit;
}

// Define o usuário da sessão
$_SESSION['usuario'] = $result['data'][0];

// redirecionar para a página inicial
header('location: index.php?rota=home');