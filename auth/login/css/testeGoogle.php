<?php
session_start();
include('..\..\config\conexao.php');

    require '..\..\vendor\autoload.php';

    // require_once 'C:\laragon\www\Brainway\auth\App\Session\User.php';


    // require __DIR__. '\laragon\www\Brainway\Brainway\vendor\autoload.php';

    //Dependencia
    use Google\Client;
    use App\Session\SessionUser; 

    //Validação principal do cookie


    //Verifica os campos obrigatorios

    if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
        header('location: index.php');
        exit;
    }

    //Coockie csrf
    $cookie = $_COOKIE ['g_csrf_token'] ?? '';

    if($_POST['g_csrf_token'] != $cookie){
        header('location: index.php');
        exit;
    }

    //Validação secundaria do token

    //Instancia do cliente google
    $client = new Client(['client_id' => '614116390287-toeb1trkh4bs40q8evalqjonftj4tahm.apps.googleusercontent.com']);  

    //Obtem os dados do usuario com base no JWT
    $payload = $client->verifyIdToken($_POST['credential']);

    //Verifica os dados do payload
    if (isset($payload['email'])) {
    //    SessionUser::login($payload['name'], $payload['email']);
    // session_start();
    
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
    $sql = "INSERT INTO usuario (id_user, usuario, nome, email, senha, data_cad, moedas, nivel) VALUES (null, null ,'$name', '$email', '', '$data_cad', '$moedas', '$nivel')";
     // Execute a consulta SQL
     if (mysqli_query($conexao, $sql)) {
        // Redirecione para a página de sucesso ou qualquer outra ação necessária
        $id_usuario = mysqli_insert_id($conexao);
        $_SESSION['id_user'] = $id_usuario;
        header('location: ../../inicio.php');
        exit;
    } else {
        // Trate erros na inserção, se houver algum
        echo 'Erro na inserção no banco de dados: ' . mysqli_error($conexao);
    }
} else {
    // O e-mail já existe na tabela, você pode tomar ação apropriada aqui, como redirecionar para a página de erro
    header('location: ../cadastro/erro_cad.php');
    exit;
} 
    } else {
// Problemas ao consultar a API
die('Problemas ao consultar API');
}
?>