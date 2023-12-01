<?php
include('../config/conexao.php');

$query = "SELECT id_lista, titulo FROM lista WHERE id_user = 1";
$resultado = mysqli_query($conexao, $query);

while ($row = $resultado->fetch_assoc()) {
    echo '<div class="lista">';

    echo $row['titulo'];
    $id_list = $row['id_lista'];
    echo '<br>';

    $query1 = "SELECT id_item, item, status_item FROM item_lista WHERE id_lista = '$id_list' and status_item = 'n'";
    $resultado1 = mysqli_query($conexao, $query1);
    
    while($row1 = $resultado1->fetch_assoc()) {
    echo $row1['item'];

    echo '<br>';

    echo '<form method="post" action="concluir.php">';
    echo '<input type="hidden" name="id_item" value="' . $row1['id_item'] . '">
    <button type="submit">concluir</button>
    </form> <br>';
    }

    echo '<br>';

    echo 'concluidas';

    $query2 = "SELECT item, status_item FROM item_lista WHERE id_lista = '$id_list' and status_item = 's' ";
    $resultado2 = mysqli_query($conexao, $query2);
    
    echo '<br>';

    while($row2 = $resultado2->fetch_assoc()) {
    echo $row2['item'];
    echo '<br>';
    };

    echo '<br><br><br>';

    echo '</div>';
}
?>