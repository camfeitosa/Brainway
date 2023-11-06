<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
<!-- 
   <script defer>

function trocarImagem(isHover) {
  const div = document.querySelector('.minha-div');
  
  if (isHover) {
    div.style.backgroundImage = 'url("pages/loja/personagens/masc1.png")';
  } else {
    div.style.backgroundImage = 'url("pages/loja/personagens/masc1.png")'
  }
}


   </script> -->
   <style>
  .perfil { 
   width: 100px;
    height: 100px;
    object-fit: cover; 
  }
  .btn-se{
   background-color: #efefef;
   border: none;
   cursor: pointer;
   object-fit: cover; 
   position: relative;

  }
.btn-se:focus{
   outline: none;
   background-color: #efefef;
}
.container2{
   top: 20px;
    position: absolute;
    left: 10px;
}
#hover{
   /* background-color: red; */
   transition: background-color 0.3s;
   background-image: url("pages/loja/personagens/masc1.png");

}

.hover:hover {
  background-color: red; /* Cor que será aplicada no hover */
}
</style>
</head>
<body>
   


<?php
ob_start();
session_start();
include('config/conexao.php');
include('pages/inventario/index.php');


// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
   // Recupere o ID do usuário da sessão
   $id_usuario = $_SESSION['id_user'];

   // Busque o nome do usuário no banco de dados usando o ID do usuário
   $query = "SELECT usuario, nome, moedas, nivel, avatar FROM usuario WHERE id_user = $id_usuario";
   $resultado = mysqli_query($conexao, $query);

   // Exiba o nome do usuário
   $usuario = mysqli_fetch_assoc($resultado);
   $avatar = $usuario["avatar"];

   if ($avatar != null) {
   echo " <div class='container2'>  <div id='hover' onmouseover='trocarImagem(true)' onmouseout='trocarImagem(false)'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo'> <img src= '$avatar' alt='Imagem' class='perfil'></a></button></div>";
   }
   else {
     echo "<img src='loja/personagens/masc1.png' alt='Imagem' class='perfil'>";
   }
   
   echo "<br>";
   echo $usuario['nome'] ; 
   
   if ($usuario['usuario'] != null) {
      echo "<br> @" . $usuario['usuario']; 
      }
      else {
         echo "<br> @brainway" ;
      }


   echo "<br>Nivel: " . $usuario['nivel']; 
   echo "<br><br>Número de moedas: " . $usuario['moedas'];  
   echo "<br ><a href='pages/recompensa/ad.php'>Ganhe recompensas</a>";
   echo "<br ><a href='config/form.php'>Configurações da conta</a>";
   echo "<br ><a href='pages/loja/exibir.php'>Loja</a>";
   echo "<br ><a href= 'pages/inventario/index.php'>Inventario</a>";

   echo "<br ><a href='logout.php'>Fazer logout</a>";
   echo "</div>";

} else {
   // Se o usuário não estiver logado, redirecione-o para a página de login
   echo "<a href='login/form.html'> Faça login </a>";
   exit();
}
?>



</body>
</html>