<?php
session_start();
include('../../config/conexao.php');

// Verifique se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];

    // Busque o nome do usuario no banco de dados usando o ID do usuário
    $query = "SELECT pontos FROM usuario WHERE id_user = '$id_usuario'";
    $resultado = mysqli_query($conexao, $query);

    $usuario = mysqli_fetch_assoc($resultado);
    $recomp_atual = $usuario['pontos'];

    // Adiciona pontos ao criar uma nota
    $nova_recomp = $recomp_atual + 5;

    // Insere as pontos no banco
    $sql = "UPDATE usuario SET pontos = '$nova_recomp' WHERE id_user = '$id_usuario'";
    mysqli_query($conexao, $sql);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    // $id_cor = $_POST['cor'];

    // Se noteId estiver definido, trata-se de uma atualização
    if (isset($_POST['noteId'])) {
        $noteId = $_POST['noteId'];
        $sql = "UPDATE nota SET titulo = ?, conteudo = ? WHERE id_nota = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $noteId);
    } else {
        // Caso contrário, é uma adição
        $sql = "INSERT INTO nota (id_user, titulo, conteudo, data_criacao) VALUES (?, ?, ?, NOW())";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iss", $id_usuario, $title, $description);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

$conexao->close();
?>
