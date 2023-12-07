<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="all">
  <h1>Loja</h1>
 <h4>Bem-vindos a loja Brainway! ganhe moedas e compre personagens</h4>
  
</div>


<?php
// session_start();
include('../../config/conexao.php');


// Busca o avatar
$query = "SELECT id_avatar, nome, caminho, valor FROM avatar WHERE valor > 0";

$resultado = mysqli_query($conexao, $query);

// Verifica se foi encontrado e a exibe
if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
    echo '<div class="container">';
    echo '<div class="product">';
    echo '<img src="' . $row['caminho'] . '" alt="' . $row['nome'] . '" width="100">';
    echo '<h3>' . $row['nome'] . '</h3>';
    echo '<div class="container-valor">';
    echo '<div class="moeda"><img src="../../includes/img/moeda.png"> </div>';
    echo '<div class="valor">' . $row['valor'] . '</div>';
    echo '</div>';
    echo '<form method="post" action="comprar.php">';
    echo '<input type="hidden" name="id_avatar" value="' . $row['id_avatar'] . '">
      <button type="submit">Comprar</button>
      </form> <br>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo "Nenhum avatar encontrado.";
}


?>

</body>

</html>