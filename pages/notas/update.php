<?php
// Código para conexão com o banco de dados
session_start();
include('../../config/conexao.php');

// Assuming you have a database connection established
// Include your database connection code here


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the frontend
    $noteId = isset($_POST["noteId"]) ? $_POST["noteId"] : null;
    $title = isset($_POST["title"]) ? $_POST["title"] : null;
    $description = isset($_POST["description"]) ? $_POST["description"] : null;

    // Check if data is set
    if ($noteId !== null && $title !== null && $description !== null) {
        // Perform the update query
        $sql = "UPDATE nota SET title = ?, description = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $noteId]);

        // You can check if the update was successful
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            echo "Note updated successfully!";
        } else {
            echo "Failed to update note.";
        }
    } else {
        echo "Invalid data received.";
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo "Invalid request";
}
?>


