<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title></title>

   <script>
      // function atualizarPontos() {
      //    var xhr = new XMLHttpRequest();
      //    xhr.onreadystatechange = function () {
      //       if (xhr.readyState === 4) {
      //          if (xhr.status === 200) {
      //             var pontos = parseInt(xhr.responseText);
      //             document.getElementById("pontos").innerText = pontos + '/100';
      //          } else {
      //             console.error("Error fetching points. Status code: " + xhr.status);
      //          }
      //       }
      //    };
      //    xhr.open("GET", "../../includes/barra/obter_pontuacao.php", true);
      //    xhr.send();
      // }

      // // Update points every 2000 milliseconds (2 seconds)
      // setInterval(atualizarPontos, 2000);

      // // Initial call to update points on page load
      // atualizarPontos();


   </script>


   <style>
      #progress-bar,
      #progress-bar1 {
         background-color: #efefef;
         width: 100%;
         height: 14px;
         display: flex;
         flex-direction: column;
         border-radius: 5px;
      }

      #barra-progresso,
      #barra-progresso1 {
         height: 20px;
         border-radius: 5px;
         transition: width 0.5s;
         /* Adiciona uma transição suave à largura da barra */
      }

      #mensagem,
      #mensagem1 {
         display: none;
         color: #27AE61;
         font-weight: bold;
         margin-top: 5px;
      }

      #barra-progresso {
         background-color: #27AE61;
      }

      #barra-progresso1 {
         background-color: #F13C4E;
      }
   </style>
</head>

<body>

   <?php
   ob_start();
   session_start();
   include('../../config/conexao.php');
   include('../inventario/pages.php');


   // Verifique se o usuário está logado
   if (isset($_SESSION['id_user'])) {
      // Recupere o ID do usuário da sessão
      $id_usuario = $_SESSION['id_user'];

      // Busque o nome do usuário no banco de dados usando o ID do usuário
      $query = "SELECT usuario, nome, moedas, pontos, nivel, num_logins, avatar FROM usuario WHERE id_user = $id_usuario";
      $resultado = mysqli_query($conexao, $query);

      // Exiba o nome do usuário
      $usuario = mysqli_fetch_assoc($resultado);
      $avatar = $usuario["avatar"];

      echo "<div  class='nome'>";

      echo "<div class='bdname'><h1>$usuario[nome] <h1>";


      if ($usuario['usuario'] != null) {
         echo "<div class='bduser'><p>@$usuario[usuario] </p></div>";
      } else {
         echo "<div class='bduser'><p>@brainway</p></div>";
      }

      echo "</div> </div>";

      if ($avatar != null) {
         echo " <div class='container2'><div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo'> <img src= '$avatar' alt='Imagem' class='perfil'><div class='overlay'><img src='../../edit.svg' class='pencil'></div></a></button></div>";
         echo "<h2>Nivel: " . $usuario['nivel'] . "</h2>";

      } else {
         echo "<div class='container2'> <div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo''><img src='../loja/personagens/m1.png' class='perfil'><div class='overlay'><img src='../../edit.svg' class='pencil'></div></a></button></div>";
         echo "<h2>Nivel: " . $usuario['nivel'] . "</h2>";
      }

      // include('../../includes/barra/index.php');
   
      echo "<div class='container-barras'>";

      echo "<div class='icons'>";
      echo "<img src='../../includes/img/coracao.png' class='coracao'>";
      echo "<img src='../../includes/img/pontos.png' class='pontos'>";
      echo "<img src='../../includes/img/moeda.png' class='moeda'>";
      echo "</div>";

      echo "<div class='barras'>";
      echo "<div class='progress1'>";
      // echo "<div id='progress-bar1'></div>";
      echo '<div id="progress-bar1"> 
      <div id="barra-progresso1"></div>
      </div>
      <div id="mensagem1">Parabéns! Você atingiu o valor máximo de logins!</div>';
      // echo "<h4>$usuario[moedas]</h4>";
      echo "</div>";

      echo "<div class='progress2'>";
      // echo "<div id='progress-bar2'></div>";
      echo '<div id="progress-bar">
      <div id="barra-progresso"></div>
      </div>
      <div id="mensagem">Parabéns! Você atingiu o valor máximo da barra!</div>';
      echo "</div>";
      // echo "<h3>$usuario[moedas]</h3>";
   
      echo "<div class='progress3'>";
      echo "<div id='progress-bar3'></div>";
      echo "</div>";

      echo "</div>";

      echo "<div class='container-pontos' id='container-pontos'>";
      echo "<h5>$usuario[num_logins]/20</h5>";
      echo "<h5  id='pontos'>$usuario[pontos]/100</h5>";
      echo "<h5>$usuario[moedas]</h5>";
      echo "</div>";

      echo "</div>";


      echo "<div class='desafios'>";
      echo "<h1>Supere os desafios</h1>";
      echo "<p>Conquiste vitórias, acumule pontos e alcance seus objetivos agora!</p>";
      echo "<button>Confira</button>";
      echo "</div>";
      echo "</div>";

   } else {
      // Se o usuário não estiver logado, redirecione-o para a página de login
      echo "<a href='../../auth/login/index.php'> Faça login </a>";
      exit();
   }


   ?>


   <script>
      function atualizarProgressBar() {
         var xhr = new XMLHttpRequest();
         xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
               var pontuacao = parseInt(xhr.responseText);
               var valorMaximo = 100; // Substitua pelo valor máximo esperado

               // Verificar se a pontuação é maior que zero antes de calcular a porcentagem
               var porcentagem = pontuacao > 0 ? (pontuacao / valorMaximo) * 100 : 0;

               // Limitar a porcentagem para não ultrapassar 100%
               porcentagem = Math.min(100, porcentagem);

               // Atualizar a barra de progresso
               var progressBar = document.getElementById("barra-progresso");
               progressBar.style.width = porcentagem + "%";

               // Exibir mensagem e reiniciar a barra quando atingir o valor máximo
               var mensagem = document.getElementById("mensagem");
               if (pontuacao == valorMaximo) {
                  mensagem.style.display = "block";

                  // Zerar a pontuação no banco de dados e adicionar moedas
                  zerarPontuacaoEAdicionarMoedas();
               } else {
                  mensagem.style.display = "none";
               }
            }
         };
         xhr.open("GET", "../../includes/barra/obter_pontuacao.php", true);
         xhr.send();
      }

      function zerarPontuacaoEAdicionarMoedas() {
         var xhr = new XMLHttpRequest();
         xhr.open("GET", "../../includes/barra/atualizar_pontuacao.php", true);
         xhr.send();
      }

      setInterval(atualizarProgressBar, 5000);
      atualizarProgressBar();
   </script>

   <script>
      function atualizarBarraDeProgresso() {
         var xhr = new XMLHttpRequest();
         xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
               var numLogins = parseInt(xhr.responseText);
               var valorMaximo = 20; // Substitua pelo valor máximo esperado (neste caso, 50)

               // Calcular a porcentagem
               var porcentagem = (numLogins / valorMaximo) * 100;

               // Limitar a porcentagem para não ultrapassar 100%
               porcentagem = Math.min(100, porcentagem);

               // Atualizar a barra de progresso
               var progressBar = document.getElementById("barra-progresso1");
               progressBar.style.width = porcentagem + "%";

               // Exibir mensagem se atingir o valor máximo
               var mensagem = document.getElementById("mensagem1");
               if (numLogins >= valorMaximo) {
                  mensagem.style.display = "block";
               } else {
                  mensagem.style.display = "none";
               }
            }
         };
         xhr.open("GET", "../../includes/barra-login/numero_logins.php", true);
         xhr.send();
      }

      setInterval(atualizarBarraDeProgresso, 2000);
      atualizarBarraDeProgresso();

   </script>



</body>

</html>