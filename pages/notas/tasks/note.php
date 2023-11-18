<?php
session_start();
include('../../../config/conexao.php');
include("load.php");
include("delete.php");
include("update.php");


if (!isset($_SESSION['id_user'])) {
    // Redirecione para a página de login se o usuário não estiver autenticado
    header("Location: ../../../auth/login/index.php");
    exit();
}

// O ID do usuário está disponível em $_SESSION['id_user']
$id_user = $_SESSION['id_user'];

// notes.php

// ... (código de autenticação)

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Prepara e executa a instrução SQL para inserir os dados na tabela
    $sql = "INSERT INTO nota (id_user, titulo, conteudo, data_criacao) VALUES (?, ?, ?, NOW())";
    
    // Utiliza uma declaração preparada para evitar injeção de SQL
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $id_usuario, $title, $description);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Fecha a conexão
$conexao->close();
?>

