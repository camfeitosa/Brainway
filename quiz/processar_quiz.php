<?php
include('conexao.php');

// Recuperar respostas do formulário
$resposta1 = $_POST['resposta1'];
$resposta2 = $_POST['resposta2'];
$resposta3 = $_POST['resposta3'];

// Inserir respostas na tabela "quiz"
$sql = "INSERT INTO quiz (pergunta, alternativa1, alternativa2, alternativa3) VALUES
    ('Qual é teste?', '$resposta1', '$resposta2', '$resposta3'), ('Qual seu teste?', '$resposta1', '$resposta2', '$resposta3'), ('Qual é a teste?', '$resposta1', '$resposta2', '$resposta3') ";

if ($conn->query($sql) === TRUE) {
    echo "Respostas do quiz inseridas com sucesso.";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
