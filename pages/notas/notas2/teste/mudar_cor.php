<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter a cor selecionada do formulário
    $corSelecionada = $_POST["cor"];

    // Exibir a div com a cor selecionada
    echo "<div class='wrapper' background-color: $corSelecionada;'></div>";
}
?>
