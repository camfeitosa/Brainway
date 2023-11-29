<?php
session_start();
include('../../config/conexao.php');

$idUsuario = $_SESSION['id_user'];

$consulta = "SELECT pontos FROM usuario WHERE id_user = $idUsuario";

$resultado = $conexao->query($consulta);

// Verificar se a consulta foi bem-sucedida
if ($resultado) {
    $row = $resultado->fetch_assoc();
    $pontuacao = $row['pontos'];
    echo $pontuacao;
} else {
    echo "Erro na consulta: " . $conexao->error;
}

// Fechar a conexão
$conexao->close();
?>
