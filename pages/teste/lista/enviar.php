<?php

include(    '../../config/conexao.php');

// Informações a serem inseridas na tabela lista
$id_user = 1; // Substitua pelo ID do usuário
$titulo = "Minha Lista";
$data_criacao = date("Y-m-d"); // Data atual no formato MySQL

// Consulta de inserção na tabela lista
$sqlLista = "INSERT INTO lista (id_user, titulo, data_criacao) VALUES ('$id_user', '$titulo', '$data_criacao')";

// Executa a consulta
if ($conn->query($sqlLista) === TRUE) {
    echo "Registro na tabela lista inserido com sucesso";
} else {
    echo "Erro ao inserir registro na tabela lista: " . $conn->error;
}
?>
