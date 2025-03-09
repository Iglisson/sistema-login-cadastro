<?php

// Início da sessão
session_start();

// Carregamento das rotas permitidas
$rotasPermitidas = require_once __DIR__ . "/../inc/rotas-permitidas.php";
$rotasDelimitadas = require_once __DIR__ . "/../inc/rotas-delimitadas.php";

// Definição da rota, se ela estiver vazia será definida como Home
$rota = $_GET['rota'] ?? 'home';

/**
 * Verifica se o usuário não está logado
 * E verifica a rota em que o usuário-não-logado está
 */
if (!isset($_SESSION['usuario']) && !in_array($rota, $rotasDelimitadas)) {
    $rota = 'login';
}

/**
 * Verifica se o usuário está logado
 * E tenta acessar a tela de login
 */
if (isset($_SESSION['usuario']) && $rota === 'login') {
    $rota = 'home';
}

/**
 * Verifica se o usuário está logado
 * E tenta acessar a tela de cadastro
 */
if (isset($_SESSION['usuario']) && $rota === 'signin') {
    $rota = 'home';
}

/**
 * Verifica se a rota não existe
 */
if (!in_array($rota, $rotasPermitidas)) {
    $rota = '404';
}

/** 
 * Navegação de páginas através das rotas
 */
$script = null;

switch ($rota) {
    case '404':
        $script = '404.php';
        break;
    
    case 'home':
        $script = 'home.php';
        break;

    case 'login':
        $script = 'login.php';
        break;
    
    case 'login-submit':
        $script = 'login-submit.php';
        break;

    case 'logout':
        $script = 'logout.php';
        break;

    case 'signin':
        $script = 'signin.php';
        break;

    case 'signin-submit':
        $script = 'signin-submit.php';
        break;
}

// Carregamento dos scripts permanentes
require_once __DIR__ . "/../inc/config.php";
require_once __DIR__ . "/../inc/database.php";

// Scripts de apresentação das páginas
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../src/scripts/{$script}";
require_once __DIR__ . "/../inc/footer.php";