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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados da solicitação POST
    $note_id = $_POST['note_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Execute a lógica de atualizar a nota no banco de dados
    $id_user = $_SESSION['id_user'];

    // Adapte isso de acordo com o seu banco de dados
    $query = "UPDATE nota SET title = ?, description = ? WHERE id = ? AND id_user = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssii", $title, $description, $note_id, $id_user);
    $stmt->execute();
    $stmt->close();

    // Envie uma resposta de sucesso
    echo "success";
}
