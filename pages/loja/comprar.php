<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
</head>
<style>
    .mensagem-loja {
        position: absolute;
        margin-top: 100px;
        color: #F13C4E;
        bottom: 560px;
        left: 590px;
        font-size: 28px;
    }
</style>

<body>

</body>

</html>

<?php
session_start();
include('../../config/conexao.php');
$id_usuario = $_SESSION['id_user'];


if (isset($_POST['id_avatar'])) {
    $id_avatar = $_POST['id_avatar'];


    $sqlselect0 = "SELECT valor, caminho FROM avatar WHERE id_avatar = '$id_avatar'";
    $result0 = $conexao->query($sqlselect0);

    $row0 = $result0->fetch_assoc();
    $valor = $row0['valor'];
    $caminho = $row0['caminho'];



    $sqlselect1 = "SELECT moedas FROM usuario WHERE id_user = '$id_usuario'";
    $result1 = $conexao->query($sqlselect1);

    $row1 = $result1->fetch_assoc();
    $moedas = $row1['moedas'];


    $sqlselect2 = "SELECT * FROM compra WHERE id_user = '$id_usuario' AND id_avatar = '$id_avatar'";
    $result2 = $conexao->query($sqlselect2);

    if ($result2->num_rows > 0) {
        include('index.php');
        echo '<h1 class="mensagem-loja">Item já comprado</h1>';
        exit();
    } elseif ($moedas >= $valor) {
        $sql = "INSERT INTO compra (id_user, id_avatar, caminho ) VALUES ('$id_usuario','$id_avatar','$caminho')";
        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0)
            $moedaFinal = $moedas - $valor;
        $sqlUpdate = "UPDATE usuario SET moedas = '$moedaFinal' WHERE id_user = '$id_usuario'";
        mysqli_query($conexao, $sqlUpdate);
        include('index.php');
        echo '<h1 class="mensagem-loja">Compra realizada com sucesso!</h1>';
        exit();
    } else {
        include('index.php');
        echo '<h1 class="mensagem-loja">Você não tem moedas o suficiente</h1>';
    }

    //buscar se o item já foi comprado pelo usuario
//buscar qunatidade de moedas e verificar se é posível realizar a compra
}
?>