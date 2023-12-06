<?php
session_start();
include('../../config/conexao.php');

if (isset($_SESSION['id_user'])) {
    $idUsuario = $_SESSION['id_user'];

    // Consultar a pontuação atual
    $consulta = "SELECT moedas, pontos, nivel FROM usuario WHERE id_user = $idUsuario";
    $resultado = $conexao->query($consulta);

    if ($resultado) {
        $row = $resultado->fetch_assoc();
        $pontuacaoAtual = $row['pontos'];
        $moedasAtual = $row['moedas'];
        $nivelAtual = $row['nivel'];

        // Definir a pontuação máxima para acionar a adição de moedas
        $pontuacaoMaxima = 100;

        if ($pontuacaoAtual >= $pontuacaoMaxima) {
            // Adicionar 100 moedas ao banco de dados
            $moedasAtual += 100;

            // Calcular o novo nível com base nas moedas acumuladas (exemplo: a cada 200 moedas, o nível aumenta)
            $moedasPorNivel = 100;
            $novoNivel = floor($moedasAtual / $moedasPorNivel) + 1;

            // Limitar o nível máximo a 5
            $novoNivel = min($novoNivel, 5);

            // Atualizar a pontuação, moedas e nível no banco de dados
            $sql = "UPDATE usuario SET pontos = 0, moedas = $moedasAtual, nivel = $novoNivel WHERE id_user = $idUsuario";

            if ($conexao->query($sql) === TRUE) {
                echo "Pontuação zerada, 100 moedas adicionadas, e nível atualizado com sucesso!";
            } else {
                echo "Erro ao zerar a pontuação, adicionar moedas e atualizar nível: " . $conexao->error;
            }
        }
    } else {
        echo "Erro na consulta: " . $conexao->error;
    }
}

// Fechar a conexão
$conexao->close();
?>
