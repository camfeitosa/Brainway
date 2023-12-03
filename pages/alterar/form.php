<?php

include('..\..\config\conexao.php');
// session_start();

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
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-config">
        <div class="info">
            <h1> Informações da conta </h1>
        </div>
        <div class="config-form">
            <form method="post" action="alteracao.php">

                <div class="campo1">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>"><br>
                </div>

                <div class="campo2">
                    <label for="nome">Nome de usuário (@):</label>
                    <input type="text" name="user" id="user" value="<?php echo $usuario['usuario'];
                    ; ?>"><br>
                </div>
                <div class="campo3">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"><br>
                </div>

                <div class="campo4">
                    <label for="senha">Nova senha:</label>
                    <input type="password" name="senha" id="senha"><br>
                </div>
                <br>

                <input type="submit" value="Salvar">
            </form>
        </div>
    </div>
</body>

</html>