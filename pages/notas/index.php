<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Notas</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
  <div class="popup-box">
    <div class="popup">
      <div class="content">
        <form id="noteForm" action="notes.php" method="post">
          <header>

            <div class="row title">
              <label for="title">Título: </label>
              <input type="text" id="title" name="title" placeholder="Adicione um título" spellcheck="false">
            </div>

            <p></p>
            <i class="uil uil-times"></i>
          </header>

          <div class="row description">
            <label for="description">Descrição</label>
            <textarea id="description" placeholder="Adicione uma descrição" name="description"
              spellcheck="false"></textarea>
          </div>
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container-wrapper >
  <div class="wrapper">
    <li class="add-box">
      <div class="icon"><i class="uil uil-plus"></i></div>
      <p>Adicionar nota</p>
    </li>
  </div>
  </div>


  </div>

  <div id="notes-container"></div>

  <!-- <form id="formCor" action="" method="post">
    <label for="cor">Escolha uma cor:</label>
    <select name="cor" id="cor">
      <?php
      // include("../../config/conexao.php");

      //cores do banco de dados
      $query = "SELECT id, nome, codigo_cor FROM cores";
      $result = $conexao->query($query);

      // Loop para exibir as opções de cores
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['codigo_cor'] . "'>" . $row['nome'] . "</option>";
      }

      // Fechar a conexão
      $conexao->close();
      ?>

</select>
<button type="button" onclick="mudarCor()">Mudar Cor</button>

  </form> -->

  <script>
    function mudarCor() {
      // Obter a cor selecionada do select
      var corSelecionada = $("#cor").val();

      // Atualizar a cor da div usando jQuery
      $(".content").css("background-color", corSelecionada);
      $(".note").css("background-color", corSelecionada);
    }
  </script>

</body>

</html>