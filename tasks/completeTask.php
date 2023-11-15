<?php
include("config/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST["taskId"];
    if ($taskId) {
        // Obtemos o ID do usuário associado à tarefa
        $userId = getUserIdFromTask($conexao, $taskId);

        if ($userId !== null) {
            completeTask($conexao, $taskId);
            updatePoints($conexao, $userId, 10); // Concede 10 pontos ao usuário
            echo "Tarefa marcada como completa. 10 pontos concedidos ao usuário.";
        } else {
            http_response_code(500);
            echo "Erro ao obter ID do usuário associado à tarefa.";
        }
    } else {
        http_response_code(400);
        echo "ID da tarefa inválido";
    }
}

function completeTask($conexao, $taskId) {
    $sql = "UPDATE tasks SET completed = 1 WHERE id = $taskId";
    $conexao->query($sql);
}

function getUserIdFromTask($conexao, $taskId) {
    $sql = "SELECT user_id FROM tasks WHERE id = $taskId";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["user_id"];
    } else {
        return null;
    }
}

function updatePoints($conexao, $userId, $points) {
    $sql = "UPDATE users SET points = points + $points WHERE id = $userId";
    $conexao->query($sql);
}

$conexao->close();
?>
