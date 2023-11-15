<!DOCTYPE html>
<html>
<head>
    <title>Mudar Cor da Div</title>
    <!-- Inclua a biblioteca jQuery (substitua pelo caminho correto) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <div id="minhaDiv" style="width: 100px; height: 100px; border: 1px solid #000;">
        <!-- A div que você deseja mudar a cor -->
        <?php
        // Se houver uma cor selecionada, exiba a div com essa cor
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cor"])) {
            $corSelecionada = $_POST["cor"];
            echo "<script>$('#minhaDiv').css('background-color', '$corSelecionada');</script>";
        }
        ?>
    </div>

    <form id="formCor" action="" method="post">
        <label for="cor">Escolha uma cor:</label>
        <select name="cor" id="cor">
            <?php
            include("../../config/conexao.php");

            // Consulta para obter as cores do banco de dados
            $query = "SELECT id, nome, codigo_cor FROM cores";
            $result = $conexao->query($query);

            // Loop para exibir as opções de cores
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['codigo_cor'] . "'>" . $row['nome'] . "</option>";
            }

            // Fechar a conexão
            $conexao->close();
            ?>
        </select>
        <button type="button" onclick="mudarCor()">Mudar Cor</button>
    </form>

    <script>
        function mudarCor() {
            // Obter a cor selecionada do select
            var corSelecionada = $("#cor").val();

            // Atualizar a cor da div usando jQuery
            $("#minhaDiv").css("background-color", corSelecionada);
        }
    </script>

</body>
</html>
