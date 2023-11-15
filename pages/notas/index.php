
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">  
    <title>Notes App in JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iconscout Link For Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  </head>
  <body>
    
    <!-- 
      <div class="toggle-container">
        <input type="checkbox" id="toggle" name="toggle" /><label for="toggle">Toggle Theme</label>
      </div> -->

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
              <textarea id="description" placeholder="Adicione uma descrição" name="description" spellcheck="false"></textarea>
            </div>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>


    <div class="wrapper">
      <li class="add-box">
        <div class="icon"><i class="uil uil-plus"></i></div>
        <p>Adicionar nota</p>
      </li>
    </div>

    <script src="script.js"></script>
    
  </body>
</html>
