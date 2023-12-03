<?php
session_start();
include('../../config/conexao.php');

if (isset($_SESSION['id_user']) && isset($_POST['note_id'])) {
    $id_user = $_SESSION['id_user'];
    $note_id = $_POST['note_id'];

    // Certifique-se de que a nota pertence ao usuário atual (opcional)
    $query = "DELETE FROM nota WHERE id_nota = ? AND id_user = ?";
    $stmt = $conexao->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ii", $note_id, $id_user);
        $stmt->execute();

        // Verifique se a exclusão foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            echo "Nota excluída com sucesso!";
        } else {
            echo "Erro ao excluir a nota. Certifique-se de que a nota pertence ao usuário atual.";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $conexao->error;
    }
} else {
    echo "Usuário não autenticado ou ID da nota não fornecido.";
}

$conexao->close();
?>
