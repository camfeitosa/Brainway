<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja</title>
  <style>
    .container {
      display: inline;
    }

    h3 {
      text-align: center;
    }

    .product {
      background-color: #efefef;
      width: 180px;
      height: 210px;
      padding: 10px;
      display: inline-block; /* Adicione esta linha */
      margin: 10px; /* Espaçamento entre os produtos */
      left: 90px;
      position: relative;
    }

    img, button{
      margin: auto;
      display: block;
    }

    /* img{
      background-color: #111;
    } */
    p{
      text-align: center;
    }

    h1{
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }
    h4{
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      color: #2b2b2b;
      opacity: 60%;
    }

    @media (max-width: 890px) {
      .product {
        width: 30%; /* Defina a largura para 100% para ocupar toda a largura da tela */
        margin: 5px; /* Espaçamento menor */
        position: relative;
        left: 5px;
      }
    }
    @media (max-width: 780px) {
      .product {
        width: 30%; /* Defina a largura para 100% para ocupar toda a largura da tela */
        margin: 5px; /* Espaçamento menor */
        position: relative;
        left: 65px;
      }
    }

  </style>
</head>

<body>

<div class="all">
  
  <h1>LOJA</h1>
 <h4>Bem-vindos a loja Brainway!!! ganha moedas e compre personagens</h4>
  
</div>
</body>

</html>

<?php

session_start();
include('..\..\config\conexao.php');


// Busca o avatar
$query = "SELECT id_avatar, nome, caminho, valor FROM avatar";

$resultado = mysqli_query($conexao, $query);

// Verifica se foi encontrado e a exibe
if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
    echo '<div class="container">';
    echo '<div class="product">';
    echo '<img src="' . $row['caminho'] . '" alt="' . $row['nome'] . '" width="100">';
    echo '<h3>' . $row['nome'] . '</h3>';
    echo '<p>Valor: ' . $row['valor'] . ' moedas </p>';
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

<style>
  .avatar {
    width: 100px;
    height: 100px;
    object-fit: cover;
  }
</style>

</body>

</html>