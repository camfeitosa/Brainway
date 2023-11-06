<?php

include('..\config\conexao.php');
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
    <meta charset="UTF-8" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <h1> Altere informações da sua conta </h1>

    <form method="post" action="alteracao.php">

        <label for="nome">Nome de usuário (@):</label>
        <input type="text" name="user" id="user" value="<?php echo $usuario['usuario'];
        ; ?>"><br>
        <br>

        <input type="submit" value="Salvar">
    </form>

    <!-- Botão para acionar modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
        Abrir modal de demonstração
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="alteracao.php">

                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome de usuário (@):</label>
                            <input type="text" name="user" class="form-control" id="user" value="<?php echo $usuario['usuario'];
                            ; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="salvar" class="btn btn-secondary" data-dismiss="modal">
                    </form>


                </div>
            </div>
        </div>
    </div>
    <a href="#my-modal" data-toggle="modal">Large modal</a>

    <div id="my-modal" aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post" action="alteracao.php">
                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome de usuário (@):</label>
                            <input type="text" name="user" class="form-control" id="user" value="<?php echo $usuario['usuario'];
                            ; ?>">
                        </div>
                        <div class="modal-footer">
                    <input type="submit" value="salvar" class="btn btn-secondary" data-dismiss="modal">
</form>

                </div>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>