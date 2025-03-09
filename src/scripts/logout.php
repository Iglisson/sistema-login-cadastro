<?php

//destroi a sessão
session_destroy();

//agora redireciona para página de login
header('location: index.php?rota=home');