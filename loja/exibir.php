<!DOCTYPE html>
<html>

<body>

<?php

session_start();
include('..\conexao.php');

// Busca o avatar
$query = "SELECT nome, caminho, valor FROM avatar";

$resultado = mysqli_query($conexao, $query);

// Verifica se foi encontrado e a exibe
if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
      echo '<div class="product">';
      echo '<img src="' . $row['caminho'] . '" alt="' . $row['nome'] . '" width="100">';
      echo '<h3>' . $row['nome'] . '</h3>';
      echo '<p>Valor: ' . $row['valor'] . ' moedas </p>';
      echo '<form method="post" action="comprar.php">
      <button type="submit">Comprar</button>
      </form> <br>';
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

