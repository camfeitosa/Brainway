<?php
session_start();
include('../../config/conexao.php');

// Verifique se o usuário está logado

if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    // $id_user = $_SESSION['id_user'];

    // // Busque o nome do usuario no banco de dados usando o ID do usuário
    // $query = "SELECT moedas FROM usuario WHERE id_user = '$id_usuario'";
    // $resultado = mysqli_query($conexao, $query);

    // $usuario = mysqli_fetch_assoc($resultado);
    // $recomp_atual = $usuario['moedas'];

    // //Adiciona moedas ao criar uma nota
    // $nova_recomp = $recomp_atual + 5;

    // //insere as moedas no banco
    // $sql = "UPDATE usuario SET moedas = '$nova_recomp' WHERE id_user = '$id_usuario'";
    // mysqli_query($conexao, $sql);


    $id_user = $_SESSION['id_user'];

    $query = "SELECT * FROM nota WHERE id_user = ? ORDER BY id_nota DESC";
    $stmt = $conexao->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $notes = $result->fetch_all(MYSQLI_ASSOC);

        echo '<div class="notes-container" style="display: flex; flex-wrap: wrap;">';

        echo ' <div class="wrapper">
                <li class="add-box">
                <div class="icon"><i class="uil uil-plus"></i></div>
                <p>Adicionar nota</p>
                </li>
                </div>';

        foreach ($notes as $note) {
            echo '<div class="container-wrapper">';
            // Converta as notas em HTML e envie como resposta
            echo '<div class="wrapper">';
            echo '<li class="note">';
            echo '    <div class="details">';
            // Use os índices corretos para acessar os dados da nota
            echo '        <p>' . htmlspecialchars($note['titulo']) . '</p>';
            echo '        <div class="desc">' . nl2br(htmlspecialchars($note['conteudo'])) . '</div>';
            echo '    </div>';
            echo '    <div class="bottom-content">';
            // Adicione uma verificação para o índice 'data_criacao' e use htmlspecialchars apenas quando o valor estiver definido
            echo '        <span>' . (isset($note['data_criacao']) ? htmlspecialchars($note['data_criacao']) : '') . '</span>';
            echo '        <div class="settings">';
            echo '            <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>';
            echo '            <ul class="menu">';
            // Use os índices corretos para acessar os dados da nota
            echo '                <li onclick="updateNote(' . $note['id_nota'] . ', \'' . htmlspecialchars($note['titulo']) . '\', \'' . nl2br(htmlspecialchars($note['conteudo'])) . '\')"><i class="uil uil-pen"></i>Editar</li>';
            echo '                <li onclick="deleteNote(' . $note['id_nota'] . ')"><i class="uil uil-trash"></i>Deletar</li>';
            echo '            </ul>';
            echo '        </div>';
            echo '    </div>';
            echo '</li>';
            echo '</div>';
            echo '</div>';
        }
        
    echo '</div>';
    
        $stmt->close();
    }
} else {
    // Trate o erro na preparação da declaração
    echo '<a href="../../auth/login/index.php">Faça login</a>' . $conexao->error;
    // die('Erro na preparação da declaração: ' . $conexao->error);
}
$conexao->close();
?>