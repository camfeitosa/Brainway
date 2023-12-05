<?php
echo "<h1> Inventário </h1>";
session_start();
include('../conexao.php');

$id_usuario = $_SESSION['id_user'];

$query = "SELECT id_avatar from compra WHERE id_user = '$id_usuario';";
$resultado = mysqli_query($conexao, $query);

if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
  $id_av = $row['id_avatar'];
  $query1 = "SELECT id_avatar, nome, caminho from avatar WHERE id_avatar = '$id_av'";
  $resultado1 = mysqli_query($conexao, $query1);
  if ($resultado1->num_rows > 0) {
  while ($row = $resultado1->fetch_assoc()) {
      $cr = "../loja/" . $row['caminho'];
      echo '<div class="product">';
      echo '<img src="' . $cr . '" alt="' . $row['nome'] . '" width="100">';
      echo '<h3>' . $row['nome'] . '</h3>';
      echo '<form method="post" action="selecionar.php">';
      echo '<input type="hidden" name="caminho" value="' . $row['caminho'] . '">
      <button type="submit">Selecionar</button>
      </form> <br>';
      echo '</div>';
      }
    }
  }
}

$query2 = "SELECT id_avatar, nome, caminho from avatar WHERE valor = 0";
$resultado2 = mysqli_query($conexao, $query2);
  while ($row2 = $resultado2->fetch_assoc()) {
    if ($resultado2->num_rows > 0) {
      while ($row2 = $resultado2->fetch_assoc()) {
      $cr2 = "../loja/" . $row2['caminho'];
        echo '<div class="product">';
        echo '<img src="' . $cr2 . '" alt="' . $row2['nome'] . '" width="100">';
        echo '<h3>' . $row2['nome'] . '</h3>';
        echo '<form method="post" action="selecionar.php">';
        echo '<input type="hidden" name="caminho" value="' . $row2['caminho'] . '">
        <button type="submit">Selecionar</button>
        </form> <br>';
        echo '</div>';
    }
  }
}
?>