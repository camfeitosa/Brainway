<?php
session_start();
require_once('../../../config/conexao.php');

// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];

    $description = filter_input(INPUT_POST, 'description');
    $id = filter_input(INPUT_POST, 'id');

    if ($description && $id) {
        // Prepare a declaração SQL
        $stmt = $conexao->prepare("UPDATE task SET description = ? WHERE id = ?");

        // Verifique se a preparação foi bem-sucedida
        if ($stmt) {
            // Vincule os parâmetros e execute a declaração
            $stmt->bind_param('si', $description, $id);
            $stmt->execute();
            $stmt->close();

            // Redirecione para a página principal
            header('Location: ../index.php');
            exit;
        } else {
            // Trate o erro de preparação
            echo "Erro na preparação da declaração: " . $conexao->error;
        }
    } else {
        // Trate o caso em que description ou id não estão definidos
        echo "Descrição ou ID não definidos.";
    }
} else {
    // Redirecione se o usuário não estiver logado
    header('Location: ../index.php');
    exit;
}
?>
