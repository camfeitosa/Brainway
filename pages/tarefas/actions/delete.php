<?php

require_once('../../../config/conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id !== false) {
    $sql = "DELETE FROM task WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('Location: ../index.php');
        exit;
    }
}

header('Location: ../index.php');
exit;
