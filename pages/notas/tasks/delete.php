<?php
session_start();
include('../../../config/conexao.php');


if (!isset($_SESSION['id_user'])) {
    // Redirecione para a página de login se o usuário não estiver autenticado
    header("Location: ../../../auth/login/index.php");
    exit();
}


// O ID do usuário está disponível em $_SESSION['id_user']
$id_user = $_SESSION['id_user'];

// delete.php

// ... (código de autenticação)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados da solicitação POST
    $note_id = $_POST['note_id'];

    // Execute a lógica de deletar a nota do banco de dados
    $id_user = $_SESSION['id_user'];

    // Adapte isso de acordo com o seu banco de dados
    $query = "DELETE FROM nota WHERE id = ? AND id_user = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $note_id, $id_user);
    $stmt->execute();
    $stmt->close();

    // Envie uma resposta de sucesso
    echo "success";
}
