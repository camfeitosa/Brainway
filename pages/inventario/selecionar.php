<?php
session_start();
include('../../config/conexao.php');
$id_usuario = $_SESSION['id_user'];

echo $id_usuario;

if (isset($_POST['caminho'])) {
    //caminho da tela inicial até a loja
    $caminho = "pages/loja/" . $_POST['caminho'];
    echo $caminho;  

    $sql = "UPDATE usuario SET avatar = '$caminho' WHERE id_user = '$id_usuario'";

    if ($conexao->query($sql) === TRUE) {
        echo "Informações da conta atualizadas com sucesso.";
        header("Location: ../../inicio.php");

    } else {
        echo "Erro na atualização: " . $conexao->error;
    }
    //mysqli_query($conexao, $sql);

}

//selecionar id do avatar correspondente, id user
//sql update 

//upadate do avatar $caminho 

?>