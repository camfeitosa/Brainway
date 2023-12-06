<?php
session_start();
include('../../config/conexao.php');

$id_usuario = $_SESSION['id_user'];

// Excluir referências na tabela cronograma
$sqlDeleteCronograma = "DELETE FROM cronograma WHERE fk_id_user = '$id_usuario'";
mysqli_query($conexao, $sqlDeleteCronograma);

// Verificar se houve algum erro na exclusão das referências
if (mysqli_errno($conexao)) {
    // Tratar o erro, se necessário
    echo "Erro ao excluir referências na tabela cronograma: " . mysqli_error($conexao);
    exit();
}

// Excluir referências na tabela nota
$sqlDeleteNota = "DELETE FROM nota WHERE id_user = '$id_usuario'";
mysqli_query($conexao, $sqlDeleteNota);

// Verificar se houve algum erro na exclusão das referências
if (mysqli_errno($conexao)) {
    // Tratar o erro, se necessário
    echo "Erro ao excluir referências na tabela nota: " . mysqli_error($conexao);
    exit();
}

// Excluir referências na tabela task
$sqlDeleteTask = "DELETE FROM task WHERE id_user = '$id_usuario'";
mysqli_query($conexao, $sqlDeleteTask);

// Verificar se houve algum erro na exclusão das referências
if (mysqli_errno($conexao)) {
    // Tratar o erro, se necessário
    echo "Erro ao excluir referências na tabela task: " . mysqli_error($conexao);
    exit();
}

// Excluir referências na tabela compra
$sqlDeleteCompra = "DELETE FROM compra WHERE id_user = '$id_usuario'";
mysqli_query($conexao, $sqlDeleteCompra);

// Verificar se houve algum erro na exclusão das referências
if (mysqli_errno($conexao)) {
    // Tratar o erro, se necessário
    echo "Erro ao excluir referências na tabela compra: " . mysqli_error($conexao);
    exit();
}

// Agora, você pode excluir o usuário
$sqlDeleteUsuario = "DELETE FROM usuario WHERE id_user = '$id_usuario'";
mysqli_query($conexao, $sqlDeleteUsuario);

// Verificar se houve algum erro na exclusão do usuário
if (mysqli_errno($conexao)) {
    // Tratar o erro, se necessário
    echo "Erro ao excluir usuário: " . mysqli_error($conexao);
    exit();
}

// Limpar a sessão
session_destroy();

// Redirecionar para a página de login
header("Location: ../../auth/login/form.php");
exit();
?>
