<?php
// Código para conexão com o banco de dados
session_start();
include('../../../config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['id_user'];
    $noteId = $_POST['noteId'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Adicione as verificações necessárias, como se a nota pertence ao usuário logado

    $sql = "UPDATE nota SET titulo = ?, conteudo = ? WHERE id_nota = ? AND id_user = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssii", $title, $description, $noteId, $id_user);
        $stmt->execute();
        $stmt->close();
    }
    $conexao->close();
}
?>
