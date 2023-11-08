<div class="container-section">
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

         echo "<p>$usuario[nome] <p>";

         if ($usuario['usuario'] != null) {
            echo "<p>@ $usuario[usuario] <p>";
         } else {
            echo "<br> @brainway";
         }

         echo "</div>";

         if ($avatar != null) {
            echo " <div class='container2'><div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo'> <img src= '$avatar' alt='Imagem' class='perfil'><div class='overlay'><img src='edit.svg' class='pencil'></div></a></button></div>";
         } else {
            echo "<div class='container2'> <div class='container-perfil'><button type='button'class='btn-se' data-toggle='modal' data-target='#modalExemplo''><img src='pages/loja/personagens/aladin.png' class='perfil'><div class='overlay'><img src='edit.svg' class='pencil'></div></a></button></div>";
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