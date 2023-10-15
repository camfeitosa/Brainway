<?php
session_start();
include('..\..\config\conexao.php');

    require 'C:\laragon\www\Brainway\vendor\autoload.php';

    require_once 'C:\laragon\www\Brainway\auth\App\Session\User.php';


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
    session_start();
    
    // insert Banco de dados

    $_SESSION['user'] = [
        'name' => $payload['name'],
        'email' => $payload['email']
    ];
    header('location: index.php');
       exit;
    } 

    //Problemas ao consultar API
    die('Problemas ao consultar API');

    // echo "<pre>";
    // print_r($cookie);
    // echo "</pre>"; 

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>"; exit;

?>