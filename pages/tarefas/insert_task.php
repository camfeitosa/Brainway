<?php
session_start();
include('../../config/conexao.php');
        // Insere a tarefa no banco de dados
        $sql = "INSERT INTO tasks (task_description, status) VALUES ('$newTask', 'pending')";

        if ($conn->query($sql) === TRUE) {
            echo "Tarefa adicionada com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conexao->error;
        }

        // Fecha a conexão
        $conexao->close();
    
?>
