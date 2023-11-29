<?php
// atualizar_numero_logins_logic.php
include('../../config/conexao.php');


if (isset($_SESSION['id_user'])) {
    $idUsuario = $_SESSION['id_user'];
// Verificar se a conexão com o banco de dados é bem-sucedida (isso pode depender da sua configuração)
if ($conexao) {
    // Atualizar o número de logins na tabela
    $sql = "UPDATE usuario SET num_logins = num_logins + 1 WHERE id_user = $idUsuario";

    if ($conexao->query($sql) === TRUE) {
        // Sucesso ao atualizar o número de logins
    } else {
        // Erro ao atualizar o número de logins
        echo "Erro ao atualizar o número de logins: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
} else {
    echo "Erro na conexão com o banco de dados.";
}

}
?>
