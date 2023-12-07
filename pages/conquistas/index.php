<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../inicio/style2.css">
   <link rel="icon" type="imagem/png" href="../../assets/images/alt_logo.png"/>
   <link rel="stylesheet" href="conquistas.css">
   <title>Home</title>
</head>

<body class="normal">

   <header>
      <div class="container-header">
         <?php
         include('../../config/conexao.php');
         echo "<br ><a href='../recompensa/ad.php'>Ganhe recompensas</a>";
         echo "<br ><a href='../alterar/index.php'>Configurações da conta</a>";
         echo "<br ><a href='../loja/index.php'>Loja</a>";
         echo "<br ><a href='../cronograma/inicio.php'>Crono</a>";
         echo "<br ><a href='../notas/inicio.php'>Nota</a>";
         echo "<br ><a href='../tarefas/index.php'>Tasks</a>";
         echo "<br ><a href='../pomodoro/index.php'>Pomo</a>";
         echo "<br ><a href='../../logout.php'>Fazer logout</a>";
         ?>
      </div>
   </header>

   <div class="container-all">
      <div class="container-section">
         <?php include('../../includes/pages.php'); ?>
      </div>

      <div class="funcionalidades">
         <div class="func-menu"></div>
         <div class="exibir">
         <div class="container-conquistas">
            <div class="titulo">
               <h1>Conquistas</h1>
               <p>Veja suas conquistas e medalhas conforme você avança</p>
            </div>
            <div class="imagens">
               <a href=""></a>
               <a href=""></a>
               <a href=""></a>
               <a href=""></a>
               <a href=""></a>
               <a href=""></a>
            </div>
            <div class="breve">
               <h1>Em breve</h1>
            </div>
            <a href=""></a>
            <a href=""></a>
         </div></div>
      </div>

   </div>


   <footer>
      <div class="footer"></div>
   </footer>

</body>

</html>