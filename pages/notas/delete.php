<?php
// Código para conexão com o banco de dados
session_start();
include('../../config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['id_user'];
    $noteId = $_POST['id_nota'];

    // Adicione as verificações necessárias, como se a nota pertence ao usuário logado

    $sql = "DELETE FROM nota WHERE id_nota = ? AND id_user = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $noteId, $id_user);
        $stmt->execute();
        $stmt->close();
    }
    $conexao->close();
}
?>
