<?php
session_start();
include('../../../config/conexao.php');

if (!isset($_SESSION['id_user'])) {
    // Redirecione para a página de login se o usuário não estiver autenticado
    header("Location: ../../../auth/login/index.php");
    exit();
} 
 
// Execute a lógica para carregar notas do banco de dados
// Certifique-se de selecionar apenas as notas associadas ao ID do usuário
$id_user = $_SESSION['id_user'];

// Adapte isso de acordo com o seu banco de dados
$query = "SELECT * FROM nota WHERE id_user = ?";
$stmt = $conexao->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $notes = $result->fetch_all(MYSQLI_ASSOC);

    // Converta as notas em HTML e envie como resposta
    foreach ($notes as $note) {
        // Converta as notas em HTML e envie como resposta
        echo '<li class="note">';
        echo '    <div class="details">';
        echo '        <p>' . htmlspecialchars($note['title']) . '</p>';
        echo '        <div class="desc">' . nl2br(htmlspecialchars($note['description'])) . '</div>';
        echo '    </div>';
        echo '    <div class="bottom-content">';
        echo '        <span>' . htmlspecialchars($note['date']) . '</span>';
        echo '        <div class="settings">';
        echo '            <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>';
        echo '            <ul class="menu">';
        echo '                <li onclick="updateNote(' . $note['id'] . ', \'' . $note['title'] . '\', \'' . nl2br(htmlspecialchars($note['description'])) . '\')"><i class="uil uil-pen"></i>Editar</li>';
        echo '                <li onclick="deleteNote(' . $note['id'] . ')"><i class="uil uil-trash"></i>Deletar</li>';
        echo '            </ul>';
        echo '        </div>';
        echo '    </div>';
        echo '</li>';
    }

    $stmt->close();
} else {
    // Trate o erro na preparação da declaração
    die('Erro na preparação da declaração: ' . $conexao->error);
}

$conexao->close();
?>
