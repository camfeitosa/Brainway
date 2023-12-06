<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../inicio/style2.css">
   <title>Pomodoro</title>
</head>

<body class="normal">

   <header>
      <div class="container-header">
         <?php
         //include('menu');
         ?>
      </div>
   </header>

   <div class="container-all">
      <div class="container-section">
         <?php include('../../includes/pages.php'); ?>
      </div>

      <div class="funcionalidades">
         <div class="func-menu"></div>
         <?php include('pomodoro.html'); ?>
      </div>

   </div>
   <footer>
      <div class="footer"></div>
   </footer>

</body>

</html>