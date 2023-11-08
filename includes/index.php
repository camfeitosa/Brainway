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

         echo "<div  class='nome'>";

         echo "<div class='bdname'><h1>$usuario[nome] <h1></div>";

         if ($usuario['usuario'] != null) {
            echo "<div class='bduser'><p>@$usuario[usuario] <p></div>";
         } else {
            echo "@brainway";
         }

         echo "</div>";

         if ($avatar != null) {
            echo " <div class='container2'><div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo'> <img src= '$avatar' alt='Imagem' class='perfil'><div class='overlay'><img src='edit.svg' class='pencil'></div></a></button></div>";
         } else {
            echo "<div class='container2'> <div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo''><img src='pages/loja/personagens/aladin.png' class='perfil'><div class='overlay'><img src='edit.svg' class='pencil'></div></a></button></div>";
            echo "<h2>Nivel: " . $usuario['nivel']."</h2>" ;
         }


         echo "<div class='barras'>";
         echo "<div class='progress1'>";
         echo"<div id='progress-bar1'><h1>$usuario[moedas]</h1></div>";
         echo"</div>";

         echo "<div class='progress2'>";
         echo"<div id='progress-bar2'><h1>$usuario[moedas]</h1></div>";
         echo"</div>";

         echo "<div class='progress3'>";
         echo"<div id='progress-bar3'><h1>$usuario[moedas]</h1></div>";
         echo"</div>";
         echo"</div>";
         
         echo "<div class='desafios'>";
         echo"<h1>Supere os desafios</h1>";
         echo"<p>Conquiste vitórias, acumule pontos e alcance seus objetivos agora!</p>";
         echo"<button>Comece já</button>";
         echo"</div>";
         

         // echo "<br><br>Número de moedas: " . $usuario['moedas'];
         // echo "<br ><a href='pages/recompensa/ad.php'>Ganhe recompensas</a>";
         // echo "<br ><a href='config/form.php'>Configurações da conta</a>";
         // echo "<br ><a href='pages/loja/exibir.php'>Loja</a>";
         // echo "<br ><a href= 'pages/inventario/index.php'>Inventario</a>";

         // echo "<br ><a href='logout.php'>Fazer logout</a>";
         echo "</div>";

      } else {
         // Se o usuário não estiver logado, redirecione-o para a página de login
         echo "<a href='login/form.html'> Faça login </a>";
         exit();
      }
      ?>

