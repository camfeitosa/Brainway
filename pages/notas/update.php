<?php
session_start();
include('../../config/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noteId = $_POST['noteId'];
    $title = $_POST['title'];
    $description = $_POST['filterDesc'];

    // Exclua a nota anterior
    $deleteSql = "DELETE FROM nota WHERE id_nota = ?";
    $deleteStmt = $conexao->prepare($deleteSql);
    $deleteStmt->bind_param("i", $noteId);
    $deleteStmt->execute();

    $response = array();

    if ($deleteStmt->affected_rows > 0) {
        // Nota anterior excluída com sucesso
        $sql = "INSERT INTO nota (id_user, titulo, conteudo, data_criacao) VALUES (?, ?, ?, NOW())";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iss", $id_usuario, $title, $description);

        if ($stmt->execute()) {
            // Busca a nota atualizada no banco e a retorna como parte da resposta
            $selectSql = "SELECT * FROM nota WHERE id_nota = ?";
            $selectStmt = $conexao->prepare($selectSql);
            $selectStmt->bind_param("i", $noteId);
            $selectStmt->execute();
            $result = $selectStmt->get_result();

            if ($result->num_rows > 0) {
                $note = $result->fetch_assoc();
                $response['success'] = true;
                $response['note'] = $note;
            } else {
                $response['success'] = false;
                $response['message'] = 'Nota não encontrada após a atualização.';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Erro ao atualizar a nota: ' . $stmt->error;
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Erro ao excluir a nota anterior: ' . $deleteStmt->error;
    }

    // Retorna a resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conexao->close();
?>
