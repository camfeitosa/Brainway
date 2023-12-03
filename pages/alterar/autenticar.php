<?php
include('..\..\config\conexao.php');
session_start();

//Recupera informações do usuário pelo ID 
if (isset($_SESSION['id_user'])) {
    $id_usuario = $_SESSION['id_user'];

    $sql = "SELECT * FROM usuario WHERE id_user = $id_usuario";
    $result = $conexao->query($sql);


    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "Usuário não autenticado.";
    exit;
}

?>