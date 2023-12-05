<?php
session_start();
include('..\conexao.php');

$id_usuario = $_SESSION['id_user'];

$sql = "DELETE from usuario WHERE id_user = '$id_usuario'";
mysqli_query($conexao, $sql);

session_destroy();

// Redirecionar para página de login
header("Location: ../login/form.html");
exit();

?>