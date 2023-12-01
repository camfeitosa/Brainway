<?php
include('../config/conexao.php');

if (isset($_POST['id_item'])) {
    $id_item = $_POST['id_item'];
    $sql = "UPDATE item_lista SET status_item = 's' WHERE id_item = '$id_item'";

   if ($conexao->query($sql) === TRUE) {
    header("Location: ex.php");
} else {
    echo "Erro";
}
}

?>