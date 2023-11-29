<?php
session_start();
include('..\..\config\conexao.php');

// processar o formulário de registro
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // validar campos
  $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
  $senhaFornecida = mysqli_real_escape_string($conexao, $_POST['senha']);

  //busca o usúario no banco de dados
  $sql = "SELECT id_user, senha FROM  usuario WHERE usuario = '$usuario' OR email = '$usuario'";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    // Usuário encontrado, verificar senha
    $row = $result->fetch_assoc();
    if (password_verify($senhaFornecida, $row['senha'])) {
        // Senha correta, permitir o login
        $_SESSION['id_user'] = $row['id_user'];
        include('numero_logins.php');
        header("Location: ../../pages/inicio/inicio.php");
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