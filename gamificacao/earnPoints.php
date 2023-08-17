<?php
include('./quiz/conexao.php');

// Consulta para atualizar os pontos do usuário (supondo que o usuário com ID 1 está ganhando pontos)
$userId = 1;
$pontosGanhos = 10;

$sql = "UPDATE usuarios SET pontos = pontos + $pontosGanhos WHERE id = $userId";

if ($conn->query($sql) === TRUE) {
    // Consulta para obter a quantidade atualizada de pontos e o nível do usuário
    $sql = "SELECT pontos, nivel FROM usuarios WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pontosAtualizados = $row["pontos"];
        $nivelAtual = $row["nivel"];

        // Verifica se o usuário atingiu um múltiplo de 100 pontos para subir de nível
        $novoNivel = $nivelAtual;
        if ($pontosAtualizados >= 100) {
            $novoNivel = floor($pontosAtualizados / 100);
            $sql = "UPDATE usuarios SET nivel = $novoNivel WHERE id = $userId";
            $conn->query($sql);
        }

        // Monta um array com os dados e retorna como JSON
        $response = array("points" => $pontosAtualizados, "nivel" => $novoNivel);
        echo json_encode($response);
    } else {
        $response = array("error" => "Usuário não encontrado");
        echo json_encode($response);
    }
} else {
    $response = array("error" => "Erro ao ganhar pontos");
    echo json_encode($response);
}

$conn->close();
?>
