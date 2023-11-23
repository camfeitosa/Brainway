<?php
session_start();
include('../../../config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['title'], $_POST['description'])) {
    $id_user = $_SESSION['id_user'];
    $id_nota = $_POST['id'];
    $titulo = $_POST['title'];
    $conteudo = $_POST['description'];

    // Atualize a nota no banco de dados
    $query = "UPDATE nota SET titulo = ?, conteudo = ? WHERE id_nota = ? AND id_user = ?";
    $stmt = $conexao->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("ssii", $titulo, $conteudo, $id_nota, $id_user);
        $stmt->execute();
        $stmt->close();
        echo "Atualização bem-sucedida!";
    } else {
        echo "Erro na preparação da declaração: " . $conexao->error;
    }
} else {
    echo "Requisição inválida!";
}

$conexao->close();
?>
