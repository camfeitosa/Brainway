<?php
session_start();
require_once('../../../config/conexao.php');


// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];
 
    // Busque o nome do usuario no banco de dados usando o ID do usuário
    $query = "SELECT pontos FROM usuario WHERE id_user = '$id_usuario'";
    $resultado = mysqli_query($conexao, $query);
 
    $usuario = mysqli_fetch_assoc($resultado);
    $recomp_atual = $usuario['pontos'];
    
    $nova_recomp = $recomp_atual + 5;
    
    //insere as pontos no banco
    $sql = "UPDATE usuario SET pontos = '$nova_recomp' WHERE id_user = '$id_usuario'";
    mysqli_query($conexao, $sql);
 
    //volta para o início
    header('Location: ../index.php');
    // exit;
    }
 

// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];

    $description = filter_input(INPUT_POST, 'description');

    if ($description) {
        $insert_query = "INSERT INTO task (description, id_user) VALUES (?, ?)";
        $insert_stmt = mysqli_prepare($conexao, $insert_query);

        if ($insert_stmt) {
            // Vincule os parâmetros da declaração preparada
            mysqli_stmt_bind_param($insert_stmt, "si", $description, $id_usuario);
            // Execute a declaração preparada
            mysqli_stmt_execute($insert_stmt);
            // Feche a declaração preparada
            mysqli_stmt_close($insert_stmt);

            // Redirecione para a página de tarefas após a inserção
            header('Location: ../index.php');
            exit;
        } else {
            // Em caso de erro ao preparar a declaração SQL
            echo 'Erro ao preparar a declaração SQL para inserção de tarefa';
            exit;
        }
    } else {
        // Se a descrição não for fornecida
        echo 'Descrição não fornecida';
        exit;
    }
} else {
    // Se o usuário não estiver logado, redirecione para a página de login
    header('Location: ../index.php');
    exit;
}
?>
