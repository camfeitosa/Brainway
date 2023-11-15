<?php
session_start();

// Verifica se a sessão já foi iniciada no dia atual
if (!isset($_SESSION['lastLoginDate']) || $_SESSION['lastLoginDate'] != date('Y-m-d')) {
    $_SESSION['progress'] = 0;
    $_SESSION['lastLoginDate'] = date('Y-m-d');
}

// Incrementa o progresso apenas se a barra de progresso não foi aumentada hoje
if (!isset($_SESSION['progressIncreased']) || !$_SESSION['progressIncreased']) {
    $_SESSION['progress'] += 10;
    $_SESSION['progressIncreased'] = true;
}

// Retorna o progresso como resposta JSON
echo json_encode(['progress' => $_SESSION['progress']]);
?>
