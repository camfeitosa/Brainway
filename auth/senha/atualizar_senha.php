<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atualizar Senha</title>
</head>

<body>
    <h1>Atualizar senha</h1>

    <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {
        //var_dump($chave);

        $query_usuario = "SELECT id_user 
                            FROM usuario 
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados);
            if (!empty($dados['SendNovaSenha'])) {
                $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = 'NULL';

                $query_up_usuario = "UPDATE usuario 
                        SET senha =:senha,
                        recuperar_senha =:recuperar_senha
                        WHERE id_user =:id_user 
                        LIMIT 1";
                $result_up_usuario = $conn->prepare($query_up_usuario);
                $result_up_usuario->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_usuario->bindParam(':id_user', $row_usuario['id_user'], PDO::PARAM_INT);

                if ($result_up_usuario->execute()) {
                    echo "Senha Atualizada!";
                    $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                    //header("Location: index.php");
                } else {
                    echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                }
            }
        } else {
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            header("Location: recuperar.php");
        }
    } else {
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        header("Location: recuperar.php");
    }

    ?>

    <form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dados['senha'])) {
            $usuario = $dados['senha'];
        } ?>
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Digite a nova senha" value="<?php echo $usuario; ?>"><br><br>

        <input type="submit" value="Atualizar" name="SendNovaSenha">
    </form>

    <br>
    <a href="../login/form.html">clique aqui</a> para logar

</body>

</html>