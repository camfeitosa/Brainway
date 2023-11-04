<?php
session_start();
include('..\..\config\conexao.php');

// processar o formulário de registro
if (isset($payload['email'])) {
  // validar campos
  // Dados do usuário
  $name = $payload['name'];
  $email = $payload['email'];

  //busca o usúario no banco de dados
  $sql = "SELECT id_user, email FROM  usuario WHERE email = '$email'";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    // Usuário encontrado, verificar senha
    $row = $result->fetch_assoc();
    if ($row['email']) {
        // Senha correta, permitir o login
        $_SESSION['id_user'] = $row['id_user'];
        header("Location: ../../inicio.php");
    } else {
        // Senha incorreta, negar o login
        include('form.html');
        echo "Senha incorreta. Tente novamente.";
    }
} else {
    // Usuário não encontrado
    echo "Usuário não encontrado!";
}
    }

?>