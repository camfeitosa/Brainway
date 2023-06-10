<?php
session_start();
include('conexao.php');

// processar o formulário de registro
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // validar campos
  $NomeUsuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $email = mysqli_real_escape_string($conexao, $_POST['email']);
  $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
  $data_cad = date('Y-m-d'); 

  // criptografar senha
  $senha_crip = password_hash($senha, PASSWORD_DEFAULT);
  
  //adicionar "@" no nome de usuario
  $user = '@' . $NomeUsuario;

  //zerar número de recompensas
  $recompensa = 0;

 
  // inserir dados do usuário na tabela
  $sql = "INSERT INTO usuario (id_user, usuario, nome, email, senha, data_cad, recompensa_t) VALUES (null, '$user','$nome', '$email', '$senha_crip', '$data_cad', '$recompensa')";
  mysqli_query($conexao, $sql);

  // verificar conclusão
  if(mysqli_affected_rows($conexao) > 0) {
    // armazenar o ID do usuário na variável de sessão
    $id_usuario = mysqli_insert_id($conexao);
    $_SESSION['id_user'] = $id_usuario;

    // direcionar o usuario para pag inicial/perfil
    header("Location: inicio.php");
  } else {echo "erro salvar";}
}

?>