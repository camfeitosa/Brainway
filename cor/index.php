<?php
include('../config/conexao.php');

// Consulta para obter as cores
$query = "SELECT id, nome, codigo_cor FROM cores";
$result = $conexao->query($query);

// Verificar se há resultados
if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Selecionar Cor</title>
    </head>
    <body>
        <form action="mudar_cor.php" method="post">
            <label for="cor">Escolha uma cor:</label>
            <select name="cor" id="cor">
                <?php
                // Loop para exibir as opções de cores
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['codigo_cor'] . "'>" . $row['nome'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Mudar Cor">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Nenhuma cor encontrada no banco de dados.";
}

// Fechar a conexão
$conexao->close();
?>
