<?php
// Defina o tempo máximo de vida da sessão em segundos (por exemplo, 30 minutos)
$sessionLifetime = 2400; // 40 minutos

// Configurar o tempo de vida da sessão antes de iniciar a sessão
ini_set('session.gc_maxlifetime', $sessionLifetime);

// Definir o tempo de expiração do cookie da sessão antes de iniciar a sessão
session_set_cookie_params($sessionLifetime);

// Iniciar a sessão após as configurações terem sido definidas
session_start();

// Verificar se o usuário está autenticado
if (isset($_SESSION['id_user'])) {
    // Verificar o tempo de inatividade do usuário
    $lastActivity = isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : 0;
    $currentTime = time();

    // Se o usuário ficou inativo por mais de 1 minuto, encerrar a sessão
    if ($currentTime - $lastActivity > 2400) {
        session_unset();    // Remove todas as variáveis de sessão
        session_destroy();  // Destroi a sessão
        header('Location: ../../logout.php'); // Redirecionar para a página de logout ou onde desejar
        exit();
    }

    // Atualizar o timestamp da última atividade
    $_SESSION['last_activity'] = $currentTime;

    // Se o usuário estiver autenticado, redirecione para a página inicial
    header('Location: ../../pages/inicio/inicio.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <script>
    function link() {
      window.location = "../../index.html";
    }
  </script>
</head>

<body>
  <header>
    <div class="logo">
      <img src="img/logo.svg" alt="logo" onclick="link()">
    </div>
  </header>

  <main>
    <div class="container-login">
      <div class="img-form">
        <div class="titulo-container">
          <div class="titulo">
            <h1>Alcance seu Máximo</h1>
          </div>
        </div>
        <div class="foquete">
          <img src="img/foquete.png" alt="">
        </div>
      </div>
      <div class="form-container">
        <form method="POST" action="validar.php">
          <div class="input-form">

            <label for="usuario">E-mail ou nome do usuário</label>
            <div class="campo1">
              <input type="text" placeholder="Digite seu e-mail ou nome de usuario" id="usuario" name="usuario"
                required>
            </div>

            <label for="senha">Senha</label>
            <div class="campo2">
              <input type="password" placeholder="Digite seu senha" id="senha" name="senha" required>
              <img src="./svg/olho-riscado.svg" class="olho" alt="olho" id="toggleBtn"
                onclick="togglePasswordVisibility()">
            </div>
            <div class="logar">
              <a href="esqueceu.php">Esqueceu sua senha?</a>
              <button class="btn-login" type="submit">Entrar</button>
            </div>
        </form>
        <div class="social-container">
          <p>ou utilize sua conta</p>
          <div class="social">
            <script src="https://accounts.google.com/gsi/client" async></script>
  
            <div id="g_id_onload"
              data-client_id="614116390287-toeb1trkh4bs40q8evalqjonftj4tahm.apps.googleusercontent.com"
              data-login_uri="http://localhost/Brainway/auth/login/form.php" data-auto_prompt="false"
              data-cancel_on_tap_outside="false">
            </div>
            <!-- STYLE -->
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with"
              data-shape="rectangular" data-logo_alignment="left">
            </div>
          </div>
          <div class="link-log">
            <a href="../cadastro/index.html">Não possui cadastro no Brainway?<span> Cadastro.</span> </a>
          </div>
      </div>
      </div>
    </div>
    </div>
  </main>

  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById('senha');
      var toggleBtn = document.getElementById('toggleBtn');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleBtn.src = './svg/olho.svg';
      } else {
        passwordField.type = 'password';
        toggleBtn.src = './svg/olho-riscado.svg'; // Volta para a imagem do olho normal
      }
    }
  </script>

</body>

</html>