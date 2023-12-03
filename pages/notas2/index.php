<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Notas</title>
  <link rel="stylesheet" href="todo.css">
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

  <div class="wrapper">
      <div class="task-input">
        <img src="bars-icon.svg" alt="icon">
        <input type="text" placeholder="Add nova tarefa">
      </div>

      <!-- Botão para limpar todas as tarefas -->
      <div class="controls">
        <button class="clear-btn">Clear All</button>
      </div>

      <ul class="task-box"></ul>

      <div class="filters">
        <span id="pending">Pendentes</span>
        <span class="active" id="all">Todas</span>
        <span id="completed">Completas</span>
      </div>

    <script src="lista.js"></script>

</body>

</html>