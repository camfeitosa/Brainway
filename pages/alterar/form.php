<?php

include('..\..\config\conexao.php');

// Iniciar a sessão apenas se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('../../config/conexao.php');

$id_usuario = $_SESSION['id_user'];

// Restante do código...

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
        <div class="infos">
            <h1> Informações da conta </h1>
        </div>
        <div class="config-form">
            <form method="post" action="alteracao.php">

                <div class="campo1">
                    <label for="nome">Nome:</label>
                    <div class="input-container">
                        <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>"
                            placeholder="Nome" maxlength="15">
                    </div>
                </div>

                <div class="line"></div>

                <div class="campo2">
                    <label for="nome">Nome de usuário (@):</label>
                    <div class="input-container">
                        <input type="text" name="user" id="user" value="<?php echo $usuario['usuario'];
                        ; ?>" placeholder="Username" maxlength="12">
                    </div>
                </div>

                <div class="line"></div>

                <div class="campo3">
                    <label for="email">E-mail:</label>
                    <div class="input-container">
                        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>"
                            placeholder="E-mail">
                    </div>
                </div>

                <div class="line"></div>

                <div class="campo4">
                    <label for="senha">Nova senha:</label>
                    <div class="input-container">
                        <input type="password" name="senha" id="senha" placeholder="Nova senha">
                    </div>
                </div>

                <div class="line"></div>

                <input type="submit" value="Salvar" style="
                    color: #2D99DA;
                    text-align: left;
                    font-family: Barlow;
                    font-size: 22px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    height: 70px;
                    cursor: url('../inicio/pointer.svg'), pointer;
                ">

            </form>

            <h4>  <a href="excluir.php">Deletar conta </a></h4>
            <p> Sua conta será deletada permanentemente </p>


        </div>
    </div>
</body>

</html>