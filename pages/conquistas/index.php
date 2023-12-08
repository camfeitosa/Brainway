<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../inicio/style.css">
   <link rel="stylesheet" href="conquistas.css">
   <!-- <link rel="stylesheet" href="style2.css"> -->
   <link rel="icon" type="imagem/png" href="../../assets/images/alt_logo.png" />
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" type="text/css" href="../../assets/css/style_l.css">
   <link rel="stylesheet" type="text/css" href="../../assets/css/style_l2.css">
   <link rel="stylesheet" type="text/css" href="../../assets/css/menu.css">
   <link rel="stylesheet" type="text/css" href="../../assets/css/footer.css">
   <title>Home</title>
</head>

<body class="normal">

   <header>
      <div class="container-header">
         <header class="dentro">
            <img src="../../assets/images/logo.png" class="logo" alt="logo">
            <nav>
               <ul class="nav-links">
                  <li><a href="../tarefas/index.php">Tarefas</a></li>
                  <li><a href="../conquistas/index.php">Conquistas</a></li>
                  <li><a href="../loja/index.php">Loja</a></li>
                  <li><a href="../contato.php">Ajuda</a></li>
               </ul>
            </nav>
            <div class="main">
               <a href="../../logout.php"><img src="../out.png" class="img-menu2"></a>
               <a href="../alterar/index.php"><img src="../../assets/images/perfil.png" class="img-menu"></a>
            </div>
            <div class="bx bx-menu" id="menu-icon"></div>
            <!--js link-->
            <script type="text/javascript" src="../../assets/js/script.js"></script>
      </div>
   </header>

   <div class="container-all">
      <div class="container-section">
         <?php include('../../includes/pages.php'); ?>
      </div>


      <div class="funcionalidades">

         <div class="func-menu">
            <div class="container-func">
               <nav>
                  <ul class="nav-links">
                     <li><a href="../tarefas/index.php">A Fazer</a></li>
                     <li><a href="../notas/inicio.php">Notas</a></li>
                     <li><a href="../cronograma/inicio.php">Cronograma</a></li>
                     <li><a href="../pomodoro/index.php">Pomodoro</a></li>
                  </ul>
               </nav>
            </div>
            <div class="btn-lateral">
               <img src="../inicio/add.svg" alt="">
               <a href="../tarefas/index.php"><p>Adicionar Tarefa</p></a>
            </div>
         </div>
         <div class="exibir">

            <div class="container-conquistas">
               <div class="titulo">
                  <h1>Conquistas</h1>
                  <p>Veja suas conquistas e medalhas conforme você avança</p>
               </div>

               <div class="wrapper-medal">

                  <div class="container-medal">
                     <div class="medalhas">
                        <div class="img-medal">
                           <img src="../loja/personagens/n1.png" alt="">
                           <h1>Brilhante</h1>

                           <div class="pontos-medal">
                              <img src="../../includes/img/pontos.png" alt="">
                              <p>Nivel 1</p>
                           </div>
                        </div>
                     </div>

                     <div class="container-medal">
                        <div class="medalhas">
                           <div class="img-medal">
                              <img src="../loja/personagens/n1_5.png" alt="">
                              <h1>Prodigioso</h1>

                              <div class="pontos-medal">
                                 <img src="../../includes/img/pontos.png" alt="">
                                 <p>Nivel 1</p>
                              </div>
                           </div>
                        </div>

                        <div class="container-medal">
                           <div class="medalhas">
                              <div class="img-medal">
                                 <img src="../loja/personagens/n2.png" alt="">
                                 <h1>Virtuoso</h1>

                                 <div class="pontos-medal">
                                    <img src="../../includes/img/pontos.png" alt="">
                                    <p>Nivel 2</p>
                                 </div>
                              </div>
                           </div>
                    
                                    <div class="container-medal">
                                       <div class="medalhas">
                                          <div class="img-medal">
                                             <img src="../loja/personagens/n2_5.png" alt="">
                                             <h1>Eminente</h1>

                                             <div class="pontos-medal">
                                                <img src="../../includes/img/pontos.png" alt="">
                                                <p>Nivel 1</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- <div class="breve">
                                    <h1>Em breve</h1>
                                 </div> -->

                              </div>
                           </div>


                        </div>

   <!-- 
                        <footer>
                           <div class="footer"></div>
                        </footer> -->

</body>

</html>