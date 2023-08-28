<?php
ob_start();
session_start();
include('conexao.php');


// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
   // Recupere o ID do usuário da sessão
   $id_usuario = $_SESSION['id_user'];

   // Busque o nome do usuário no banco de dados usando o ID do usuário
   $query = "SELECT usuario, nome, moedas, nivel, avatar FROM usuario WHERE id_user = $id_usuario";
   $resultado = mysqli_query($conexao, $query);

   // Exiba o nome do usuário
   $usuario = mysqli_fetch_assoc($resultado);
   $caminho = $usuario["avatar"];

   if ($caminho != null) {
   $foto_usuario = "config/foto_perfil/" . $caminho; 
   echo "<img src= '$foto_usuario' alt='Imagem' class='perfil'>";
   } else {
      echo "<img src='loja/personagens/woody.png'' alt='Imagem' class='perfil_d'>";
   }
   
   echo "<br>";
   echo $usuario['nome'] ; 
   
   echo "<br> @" . $usuario['usuario']; 
   echo "<br>Nivel: " . $usuario['nivel']; 
   echo "<br><br>Número de moedas: " . $usuario['moedas'];  
   echo "<br ><a href='recompensa/ad.php'>Ganhe recompensas</a>";
   echo "<br ><a href='config/form.php'>Configurações da conta</a>";
   echo "<br ><a href='loja/exibir.php'>Loja</a>";

   echo "<br ><a href='logout.php'>Fazer logout</a>";

} else {
   // Se o usuário não estiver logado, redirecione-o para a página de login
   echo "<a href='login/form.html'> Faça login </a>";
   exit();
}
?>

<style>
  .perfil { 
   width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover; 
  }

  .perfil_d { 
   width: 100px;
    height: 100px;
    object-fit: cover; 
  }
</style>