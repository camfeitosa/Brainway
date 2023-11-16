<?php
//arrumar
include('../config/conexao.php');
include('form.php');

// Processar o envio do formulário e atualizar as informações
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os novos dados do formulário
    $novo_nome = $_POST['nome'];
    $novo_user = $_POST['user'];
    $novo_email = $_POST['email'];
    $nova_senha = $_POST['senha'];

    // Verifica os dados 
    if (!empty($novo_nome) && !empty($novo_email) && !empty($novo_user)) {
            // Atualizar as informações no banco de dados 
            $sql = "UPDATE usuario SET nome = '$novo_nome', email = '$novo_email', usuario = '$novo_user'";
            if (!empty($nova_senha)) {
                // Criptografar a senha
                $hashed_password = password_hash($nova_senha, PASSWORD_DEFAULT);
                $sql .= ", senha = '$hashed_password'";
            }
            $sql .= " WHERE id_user = $id_usuario";

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
