<?php
session_start();
include('..\..\config\conexao.php');

require '..\..\vendor\autoload.php';

//Dependencia
use Google\Client;
use App\Session\SessionUser;

//Verifica os campos obrigatorios

if (!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
    header('location: index.php');
    exit;
}

//Coockie csrf
$cookie = $_COOKIE['g_csrf_token'] ?? '';

if ($_POST['g_csrf_token'] != $cookie) {
    header('location: index.php');
    exit;
}

//Instancia do cliente google
$client = new Client(['client_id' => '614116390287-toeb1trkh4bs40q8evalqjonftj4tahm.apps.googleusercontent.com']);

//Obtem os dados do usuario com base no JWT
$payload = $client->verifyIdToken($_POST['credential']);

//Verifica os dados do payload
if (isset($payload['email'])) {

    // insert Banco de dados
    $data_cad = date('Y-m-d');

    // Dados do usuário
    $name = $payload['name'];
    $email = $payload['email'];

    //zera moedas e nível
    $moedas = 0;
    $nivel = 0;

    // Verifica se o e-mail já existe na tabela
    $query = "SELECT COUNT(*) as count FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] == 0) {

        // inserir dados do usuário na tabela
        $sql = "INSERT INTO usuario (id_user, usuario, nome, email, senha, data_cad, moedas, avatar, nivel) VALUES (null, null ,'$name', '$email', '', '$data_cad', '$moedas','pages/loja/personagens/fem1.png' ,'$nivel')";
        // Execute a consulta SQL
        if (mysqli_query($conexao, $sql)) {
            // Redirecione para a página de acesso
            $id_usuario = mysqli_insert_id($conexao);
            $_SESSION['id_user'] = $id_usuario;
            header('location: ../../pages/inicio/inicio.php');
            exit;
        } else {
            // Trate erros na inserção
            echo 'Erro na inserção no banco de dados: ' . mysqli_error($conexao);
        }
    } else {

        // Se já existir o email no banco o user será direcionado para a página inicial

        if (isset($payload['email'])) {

            // Dados do usuário
            $email = $payload['email'];

            //busca o usúario no banco de dados
            $sql = "SELECT id_user, email FROM  usuario WHERE email = '$email'";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                // Usuário encontrado, verificar senha
                $row = $result->fetch_assoc();
                if ($row['email']) {
                    // email existente, permitir o login
                    $_SESSION['id_user'] = $row['id_user'];

                    include('numero_logins.php');
                    
                    header("Location: ../../pages/inicio/inicio.php");
                } else {
                    // email inexistente, negar o login
                    include('index.php');
                    echo "Email incorreto. Tente novamente.";
                }
            } else {
                // Usuário não encontrado
                echo "Usuário não encontrado!";
            }
        }
    }
} else {
    // Problemas ao consultar a API
    die('Problemas ao consultar API');
}
?>