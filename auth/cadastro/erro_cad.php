<?php
include('..\..\config\conexao.php');


//arumar
$verf = "SELECT email FROM  usuario WHERE email = '$email'";
$fim = $conexao->query($verf);

if ($fim->num_rows > 0) {
echo "Email já está cadastrado!";
} else {
echo "Nome de usuário já cadastrado!";
} 

?>
