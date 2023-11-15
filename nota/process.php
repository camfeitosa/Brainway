<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $conn = new mysqli("seu_servidor", "seu_usuario", "sua_senha", "seu_banco_de_dados");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obter dados do formulário
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Suponha que você tenha o ID do usuário disponível após a autenticação
    $user_id = 1; // Substitua pelo ID do usuário real após a autenticação

    // Preparar e executar a consulta SQL
    $sql = "INSERT INTO notes (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Nota adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $conn = new mysqli("seu_servidor", "seu_usuario", "sua_senha", "seu_banco_de_dados");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obter dados do formulário
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Suponha que você tenha o ID do usuário disponível após a autenticação
    $user_id = 1; // Substitua pelo ID do usuário real após a autenticação

    // Preparar e executar a consulta SQL
    $sql = "INSERT INTO notes (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Nota adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
?>
