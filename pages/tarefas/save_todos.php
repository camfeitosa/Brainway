<?php
// save_todos.php


// Receber os dados JSON do corpo da requisição POST
$data = json_decode(file_get_contents("php://input"), true);

// Verificar se a decodificação foi bem-sucedida
if ($data === null) {
    echo json_encode(array('error' => 'Erro ao decodificar JSON.'));
    exit;
}

// Iterar sobre os todos e inserir na tabela item_lista
foreach ($data['todos'] as $todo) {
    $titulo = $todo['name'];  // Supondo que o nome da tarefa está na chave 'name'
    $data_criacao = date("Y-m-d");  // Data atual

    // Inserir na tabela lista
    $sql_lista = "INSERT INTO lista (id_user, titulo, data_criacao) VALUES (1, '$titulo', '$data_criacao')";

    if ($conn->query($sql_lista) !== true) {
        echo json_encode(array('error' => 'Erro ao inserir na tabela lista: ' . $conn->error));
        exit;
    }

    $id_lista = $conn->insert_id;  // Obter o ID inserido na tabela lista

    // Inserir na tabela item_lista
    $sql_item_lista = "INSERT INTO item_lista (id_lista, item, data_conclusao, prioridade, descricao, status_item) VALUES ('$id_lista', '$titulo', NULL, 'Baixa', '', 'pending')";

    if ($conn->query($sql_item_lista) !== true) {
        echo json_encode(array('error' => 'Erro ao inserir na tabela item_lista: ' . $conn->error));
        exit;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Responder com sucesso (opcional)
echo json_encode(array('success' => 'Dados inseridos com sucesso.'));
?>
