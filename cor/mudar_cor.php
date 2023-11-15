<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter a cor selecionada do formulário
    $corSelecionada = $_POST["cor"];

    // Exibir a div com a cor selecionada
    echo "<div style='width: 100px; height: 100px; background-color: $corSelecionada;'></div>";
}
?>
