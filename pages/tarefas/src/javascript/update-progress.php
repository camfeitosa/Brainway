<?php
// Inclua o arquivo de conexão
// require_once('../../database/conn.php');
include('../../../../config/conexao.php');


// Verifique se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados da requisição
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_BOOLEAN);

    // Verifique se as variáveis estão definidas e são válidas
    if ($id !== false && $completed !== null) {
        // Prepare a consulta SQL
        $sql = "UPDATE task SET completed = ? WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql);

        // Execute a consulta
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $completed, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // Responda com sucesso
            echo json_encode(['success' => true]);
            exit;
        } else {
            // Se houver um erro na preparação da consulta, responda com falha
            echo json_encode(['success' => false]);
            exit;
        }
    }
}

// Se não houver dados ou falha na execução, responda com falha
echo json_encode(['success' => false]);
exit;
?>
