<?php
include('../config/conexao.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $assunto = mysqli_real_escape_string($conexao, $_POST['assunto']);
 
  $sql = "INSERT INTO contato (id_mensagem, nome, email, assunto) VALUES (null, '$nome','$email', '$assunto')";
  mysqli_query($conexao, $sql);

  if (mysqli_affected_rows($conexao) > 0) {
    echo "mensagem enviada!";
  } else {
    echo "mensagem nao enviada!";
}
}

?>