<?php
session_start();
include('../../config/conexao.php');

if (isset($_SESSION['id_user'])) {
    $idUsuario = $_SESSION['id_user'];

    // Atualizar a pontuação para 0
    $sql = "UPDATE usuario SET pontos = 0 WHERE id_user = $idUsuario";

    if ($conexao->query($sql) === TRUE) {
        // Atualização bem-sucedida
        echo "Pontuação zerada com sucesso!";
    } else {
        // Erro na atualização
        echo "Erro ao zerar a pontuação: " . $conexao->error;
    }
}

// Fechar a conexão
$conexao->close();
?>
