<?php
include("../config/conexao.php");
session_start();

// Consulta para obter a pontuação do usuário (substitua pela sua consulta SQL)
$usuario_id = 5; // Substitua pelo ID do usuário
$query = "SELECT moedas FROM usuario WHERE id = $usuario_id";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pontuacao = $row['moedas'];
} else {
    $pontuacao = 0;
}

?>

<div id="pontuacao-valor" style="display: none;"><?php echo $pontuacao; ?></div>
