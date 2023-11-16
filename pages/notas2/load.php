<?php
session_start();
include('../../config/conexao.php');

// Verifique se o usuário está logado

if (isset($_SESSION['id_user'])) {
    // Recupere o ID do usuário da sessão
    $id_usuario = $_SESSION['id_user'];
 
    // Busque o nome do usuario no banco de dados usando o ID do usuário
    $query = "SELECT moedas FROM usuario WHERE id_user = '$id_usuario'";
    $resultado = mysqli_query($conexao, $query);
 
    $usuario = mysqli_fetch_assoc($resultado);
    $recomp_atual = $usuario['moedas'];
    
    // Adiciona moedas ao criar uma nota
    $nova_recomp = $recomp_atual + 5;
    
    // Insere as moedas no banco
    $sql = "UPDATE usuario SET moedas = '$nova_recomp' WHERE id_user = '$id_usuario'";
    mysqli_query($conexao, $sql);
}

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
        header("Location: index.php");
    } else {
        echo "Erro: " . $stmt->error;
    }
    // Fecha a declaração preparada
    $stmt->close();
}

// Consulta SQL para recuperar todas as notas do usuário
$sql_notas = "SELECT id_nota, titulo, conteudo, data_criacao FROM nota WHERE id_user = ?";
$stmt_notas = $conexao->prepare($sql_notas);
$stmt_notas->bind_param("i", $id_usuario);
$stmt_notas->execute();


$result_notas = $stmt_notas->get_result();


// Mostra as notas na página
while ($nota = $result_notas->fetch_assoc()) {
    echo "ID Nota: " . $nota['id_nota'] . "<br>";
    echo "Título: " . $nota['titulo'] . "<br>";
    echo "Conteúdo: " . $nota['conteudo'] . "<br>";
    echo "Data de Criação: " . $nota['data_criacao'] . "<br>";
    echo "<hr>";
}

// Fecha a declaração preparada
$stmt_notas->close();

// Fecha a conexão com o banco de dados
$conexao->close();
?>
