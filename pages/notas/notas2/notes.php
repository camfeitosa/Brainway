<?php
session_start();
include('../../../config/conexao.php');

// Verifique se o usuário está logado

if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];
 
    // Busque o nome do usuario no banco de dados usando o ID do usuário
    $query = "SELECT moedas FROM usuario WHERE id_user = '$id_usuario'";
    $resultado = mysqli_query($conexao, $query);
 
    $usuario = mysqli_fetch_assoc($resultado);
    $recomp_atual = $usuario['moedas'];
    
    //Adiciona moedas ao criar uma nota
    $nova_recomp = $recomp_atual + 5;
    
    //insere as moedas no banco
    $sql = "UPDATE usuario SET moedas = '$nova_recomp' WHERE id_user = '$id_usuario'";
    mysqli_query($conexao, $sql);
}


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $id_cor = $_POST['cor'];

    // Prepara e executa a instrução SQL para inserir os dados na tabela
    $sql = "INSERT INTO nota (id_user, titulo, conteudo, data_criacao) VALUES (?, ?, ?, NOW())";
    
    // Utiliza uma declaração preparada para evitar injeção de SQL
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $id_usuario, $title, $description);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// Execute a lógica para carregar notas do banco de dados
// Certifique-se de selecionar apenas as notas associadas ao ID do usuário


// $id_user = $_SESSION['id_user'];

// // Adapte isso de acordo com o seu banco de dados
// $query = "SELECT * FROM nota WHERE id_user = ?";
// $stmt = $conexao->prepare($query);

// if ($stmt) {
//     $stmt->bind_param("i", $id_user);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $notes = $result->fetch_all(MYSQLI_ASSOC);

//     // Converta as notas em HTML e envie como resposta
//     foreach ($notes as $note) {
//         // Converta as notas em HTML e envie como resposta
//       // ...

// foreach ($notes as $note) {
//     // Converta as notas em HTML e envie como resposta
//     echo '<div class="wrapper">';
//     echo '<li class="note">';
//     echo '    <div class="details">';
//     // Use os índices corretos para acessar os dados da nota
//     echo '        <p>' . htmlspecialchars($note['titulo']) . '</p>';
//     echo '        <div class="desc">' . nl2br(htmlspecialchars($note['conteudo'])) . '</div>';
//     echo '    </div>';
//     echo '    <div class="bottom-content">';
//     // Adicione uma verificação para o índice 'data_criacao' e use htmlspecialchars apenas quando o valor estiver definido
//     echo '        <span>' . (isset($note['data_criacao']) ? htmlspecialchars($note['data_criacao']) : '') . '</span>';
//     echo '        <div class="settings">';
//     echo '            <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>';
//     echo '            <ul class="menu">';
//     // Use os índices corretos para acessar os dados da nota
//     echo '                <li onclick="updateNote(' . $note['id_nota'] . ', \'' . htmlspecialchars($note['titulo']) . '\', \'' . nl2br(htmlspecialchars($note['conteudo'])) . '\')"><i class="uil uil-pen"></i>Editar</li>';
//     echo '                <li onclick="deleteNote(' . $note['id_nota'] . ')"><i class="uil uil-trash"></i>Deletar</li>';
//     echo '            </ul>';
//     echo '        </div>';
//     echo '    </div>';
//     echo '</li>';
//     echo '</div>';
// }

// // ...

//     }

//     $stmt->close();
// } else {
//     // Trate o erro na preparação da declaração
//     die('Erro na preparação da declaração: ' . $conexao->error);
// }

$conexao->close();
?>
