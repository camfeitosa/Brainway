<?php
session_start();
include('../../config/conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    // Redireciona para a página de login ou realiza alguma outra ação
    header("Location: /caminho/para/pagina-de-login.php");
    exit();
}

// Obtém o ID do usuário logado
$id_usuario = $_SESSION['id_user'];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Prepara e executa a instrução SQL para inserir os dados na tabela
    $sql = "INSERT INTO nota (id_user, titulo, conteudo, data_criacao) VALUES (?, ?, ?, NOW())";
    
    // Utiliza uma declaração preparada para evitar injeção de SQL
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $id_usuario, $title, $description);

    if ($stmt->execute()) {
        echo "Nota adicionada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

// ... (seu código existente)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["title"]) && isset($_POST["description"])) {
        // Seu código PHP para adicionar nota ao banco de dados aqui

        // Após inserir a nota, obtenha os dados da nota
        $notaInserida = obterDadosNotaInserida($conexao, $id_usuario, $title, $description);

        // Retorne os dados da nota como JSON
        echo json_encode($notaInserida);
    } else {
        echo json_encode(["erro" => "Campos obrigatórios não definidos."]);
    }
} else {
    echo json_encode(["erro" => "Acesso inválido."]);
}

// Função para obter os dados da nota inserida
function obterDadosNotaInserida($conexao, $id_usuario, $title, $description) {
    // ... (seu código para inserir a nota)

    // Obtém o ID da última inserção
    $id_inserido = $conexao->insert_id;

    // Consulta para obter os dados da nota recém-inserida
    $sql = "SELECT * FROM nota WHERE id_nota = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_inserido);
    $stmt->execute();

    // Obtém os resultados da consulta
    $result = $stmt->get_result();
    $nota = $result->fetch_assoc();

    // Fecha a declaração preparada
    $stmt->close();

    return $nota;
}


// Fecha a conexão
$conexao->close();
?>
