<?php

include('..\conexao.php');
session_start();

//Recupera informações do usuário pelo ID 
if (isset($_SESSION['id_user'])) {
    $id_usuario = $_SESSION['id_user'];
    
    $sql = "SELECT * FROM usuario WHERE id_user = $id_usuario";
    $result = $conexao->query($sql);


    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "Usuário não autenticado.";
    exit;
}

?>


<html>
<head>
  <title>Alterar informações</title>
  <meta charset="UTF-8"/>
</head>

<body>
    <h1> Altere informações da sua conta </h1>

    <form method="post" action="alteracao.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>"><br>
        
        <label for="nome">Nome de usuário (@):</label>
        <input type="text" name="user" id="user" value="<?php echo $usuario['usuario'];; ?>"><br>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"><br>
        
        <label for="senha">Nova senha:</label>
        <input type="password" name="senha" id="senha"><br>
        
        <br>

        <input type="submit" value="Salvar">
    </form>

</body>

</html>