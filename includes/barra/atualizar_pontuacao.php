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

    // Definir a pontuação necessária para subir de nível
    $pontuacaoParaNivel = 100;

    // Verificar se a pontuação atual é suficiente para subir de nível
    if ($pontuacaoAtual >= $pontuacaoParaNivel) {
        // Calcular a nova pontuação (zerar)
        $novaPontuacao = 0;

        // Adicionar 150 moedas ao banco de dados
        $moedasAtual += 150;

        // Calcular quantos níveis devem ser aumentados
        $niveisParaAumentar = floor($pontuacaoAtual / $pontuacaoParaNivel);

        // Calcular o novo nível
        $novoNivel = $nivelAtual + $niveisParaAumentar;

        // Limitar o nível máximo a 5
        $novoNivel = min($novoNivel, 5);

        // Atualizar a pontuação, moedas e nível no banco de dados
        $sql = "UPDATE usuario SET pontos = $novaPontuacao, moedas = $moedasAtual, nivel = $novoNivel WHERE id_user = $idUsuario";

        if ($conexao->query($sql) === TRUE) {
            echo "Pontuação zerada, 150 moedas adicionadas, e nível aumentado com sucesso!";
        } else {
            echo "Erro ao zerar pontuação, adicionar moedas e nível: " . $conexao->error;
        }
    }
} else {
    echo "Erro na consulta: " . $conexao->error;
}

}

// Fechar a conexão
$conexao->close();
?>
