<?php
//arrumar
include('../config/conexao.php');
include('form.php');

// Processar o envio do formulário e atualizar as informações
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os novos dados do formulário
   
    $novo_user = $_POST['user'];

    // Verifica os dados 
    if (!empty($novo_nome) ) {
            // Atualizar as informações no banco de dados 
            $sql = "UPDATE usuario SET usuario = '$novo_user'";

            if ($conexao->query($sql) === TRUE) {
                echo "Informações da conta atualizadas com sucesso.";
            } else {
                echo "Erro na atualização: " . $conexao->error;
            }
    } else {
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
}
$conexao->close();

?>