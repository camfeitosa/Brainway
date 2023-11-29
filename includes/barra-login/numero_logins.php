<?php
session_start();
include('../../config/conexao.php');

if (isset($_SESSION['id_user'])) {
    $idUsuario = $_SESSION['id_user'];

    // Consultar a quantidade de logins
    $consulta = "SELECT num_logins FROM usuario WHERE id_user = $idUsuario";
    $resultado = $conexao->query($consulta);

    if ($resultado) {
        $row = $resultado->fetch_assoc();
        $numLogins = $row['num_logins'];
        
        // Definir o valor máximo para acionar a adição de moedas
        $valorMaximo = 20;

        if ($numLogins >= $valorMaximo) {
            // Adicionar 100 moedas ao banco de dados
            $moedasAtual = 100;
            
            // Atualizar a pontuação, moedas e número de logins no banco de dados
            $sql = "UPDATE usuario SET pontos = 0, moedas = moedas + $moedasAtual, num_logins = 0 WHERE id_user = $idUsuario";

            if ($conexao->query($sql) === TRUE) {
                echo "Número de logins resetado, 100 moedas adicionadas com sucesso!";
            } else {
                echo "Erro ao resetar o número de logins e adicionar moedas: " . $conexao->error;
            }
        } else {
            echo $numLogins;
        }
    } else {
        echo "Erro na consulta: " . $conexao->error;
    }
}

// Fechar a conexão
$conexao->close();
?>
