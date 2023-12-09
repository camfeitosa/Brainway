<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title></title>
   <!-- <link rel="stylesheet" href="style.css"> -->
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

      .overlay2 {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.40);
         backdrop-filter: blur(2px);
         z-index: 999;
         /* Certifique-se de que a sobreposição está acima de outros elementos */
      }

      #imagem-comemorativa {
         display: none;
         width: 500px;
         /* Ajuste o tamanho conforme necessário */
         height: auto;
         /* Ajuste o tamanho conforme necessário */
         position: absolute;
         top: 50%;
         /* Posiciona a imagem no centro verticalmente */
         left: 50%;
         /* Posiciona a imagem no centro horizontalmente */
         transform: translate(-50%, -50%);
         z-index: 1000;
         /* Certifica-se de que a imagem está acima de outros elementos */
      }
   </style>
</head>

<body>
   <?php
   ob_start();
   // Iniciar a sessão apenas se não estiver iniciada
   if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }
   // Verificar se 'id_user' está definido na sessão
   if (!isset($_SESSION['id_user'])) {
      header('Location:../../auth/login/index.php');
      exit();
   }

   // Restante do seu código aqui
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

      echo "<div class='nome'>";
      echo "<div class='bdname'><h1>$usuario[nome] </h1></div>";

      if ($usuario['usuario'] != null) {
         echo "<div class='bduser'><p>@$usuario[usuario] </p></div>";
      } else {
         echo "<div class='bduser'><p>@brainway</p></div>";
      }

      echo "</div>";

      if ($avatar != null) {
         echo "<div class='container7'><div class='container-perfil'><button type='button' class='btn-se' data-toggle='modal' data-target='#modalExemplo'> <img src= '$avatar' alt='Imagem' class='perfil'><div class='overlay'><img src='../../edit.svg' class='pencil'></div></button></div>";
         echo "<h2>Nivel: " . $usuario['nivel'] . "</h2>";
      } else {
         echo "<div class='container7'> <div class='container-perfil'><button type='button' class='btn-se' data-toggle='modal' data-target='#modalExemplo'><img src='../loja/personagens/m12.png' class='perfil'><div class='overlay'><img src='../../edit.svg' class='pencil'></div></button></div>";
         echo "<h2>Nivel: " . $usuario['nivel'] . "</h2>";
      }

      echo "<div class='container-barras'>";
      echo "<div class='icons'>";
      echo "<img src='../../includes/img/coracao.png' class='coracao'>";
      echo "<img src='../../includes/img/pontos.png' class='pontos'>";
      echo "<img src='../../includes/img/moeda.png' class='moeda'>";
      echo "</div>";

      echo "<div class='barras'>";
      echo "<div class='progress1'>";
      echo '<div id="progress-bar1"><div id="barra-progresso1"></div></div>';
      echo "<div id='mensagem1'>Parabéns! Você atingiu o valor máximo de logins!</div>";
      echo "</div>";

      echo "<div class='progress2'>";
      echo '<div id="progress-bar"><div id="barra-progresso"></div></div>';
      echo '<img id="imagem-comemorativa" src="../../includes/barra/nivel.png" alt="Imagem Comemorativa" style="display: none;">';
      echo "</div>";

      echo "<div class='progress3'>";
      echo "<div id='progress-bar3'></div>";
      echo "</div>";

      echo "</div>";

      echo "<div class='container-pontos' id='container-pontos'>";
      echo "<h5>$usuario[num_logins]/20</h5>";
      echo "<h5 id='pontos'>$usuario[pontos]/100</h5>";
      echo "<h5>$usuario[moedas]</h5>";
      echo "</div>";

      echo "</div>";

      echo "<div class='desafios'>";
      echo "<h1>Supere os desafios</h1>";
      echo "<p>Conquiste vitórias, acumule pontos e alcance seus objetivos agora!</p>";
      echo "<a href='../conquistas/index.php'><button>Confira</button>";
      echo "</div>";
      echo "<div class='overlay2'></div>";
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

               // Calcular a porcentagem
               var porcentagem = (pontuacao / valorMaximo) * 100;

               // Limitar a porcentagem para não ultrapassar 100%
               porcentagem = Math.min(100, porcentagem);

               // Atualizar a barra de progresso
               var progressBar = document.getElementById("barra-progresso");
               progressBar.style.width = porcentagem + "%";

               // Exibir mensagem e mostrar a imagem comemorativa quando atingir o valor máximo
               var imagemComemorativa = document.getElementById("imagem-comemorativa");
               var overlay = document.querySelector('.overlay2'); // Adicione essa linha

               if (pontuacao == valorMaximo) {
                  imagemComemorativa.style.display = "block";
                  overlay.style.display = "block"; // Adicione essa linha

                  // Zerar a pontuação no banco de dados e adicionar moedas
                  zerarPontuacaoEAdicionarMoedas();
               } else {
                  imagemComemorativa.style.display = "none";
                  overlay.style.display = "none"; // Adicione essa linha
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

<script>
         function atualizarPontos() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
               if (xhr.readyState === 4) {
                  if (xhr.status === 200) {
                     var pontos = parseInt(xhr.responseText);
                     document.getElementById("pontos").innerText = pontos + '/100';
                  } else {
                     console.error("Error fetching points. Status code: " + xhr.status);
                  }
               }
            };
            xhr.open("GET", "../../includes/barra/obter_pontuacao.php", true);
            xhr.send();
         }

         // Update points every 2000 milliseconds (2 seconds)
         setInterval(atualizarPontos, 2000);

         // Initial call to update points on page load
         atualizarPontos();


      </script>
</body>

</html>