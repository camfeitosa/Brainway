<?php
session_start();
include('../../config/conexao.php');


// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
   // Recupere o ID do usuário da sessão
   $id_usuario = $_SESSION['id_user'];

   // Busque o nome do usuario no banco de dados usando o ID do usuário
   $query = "SELECT pontos FROM usuario WHERE id_user = '$id_usuario'";
   $resultado = mysqli_query($conexao, $query);

   $usuario = mysqli_fetch_assoc($resultado);
   $recomp_atual = $usuario['pontos'];
   
   $nova_recomp = $recomp_atual + 10;
   
   //insere as pontos no banco
   $sql = "UPDATE usuario SET pontos = '$nova_recomp' WHERE id_user = '$id_usuario'";
   mysqli_query($conexao, $sql);

   //volta para o início
   header('Location: ../inicio/inicio.php');
   exit;
   }

?>