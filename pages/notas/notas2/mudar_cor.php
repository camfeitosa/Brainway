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