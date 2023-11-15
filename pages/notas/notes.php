<?php
session_start();
include('../../config/conexao.php');
$id_usuario = $_SESSION['id_user'];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Prepara e executa a instrução SQL para inserir os dados na tabela
    $sql = "INSERT INTO notes (title, description) VALUES ('$title', '$description')";

    if ($conexao->query($sql) === TRUE) {
        echo "Nota adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }
}

// Fecha a conexão
$conexao->close();
?>