<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <!-- menu -->
  </header>

  <main>
    <div class="container-login">
      <div class="img-form">
        <h1>Alcançe seu máximo</h1>
        <img src="css/img.png" alt="" >
      </div>

      <div class="form">
        <form method="POST" action="validar.php">
          <div class="inpt1">
            <label for="usuario">E-mail ou nome do usuário</label>
            <input type="text" placeholder="Nome de usuario ou email" id="usuario" name="usuario" required>
          </div>

          <div class="inpt2">
            <label for="senha">Senha</label>
            <input type="password" placeholder="Digite seu senha" id="senha" name="senha" required>
          </div>

          <a href="esqueceu.php">Esqueceu a senha?</a>
          <br>
          <button type="submit">Login</button>
        </form>
        <div class="social">

          <script src="https://accounts.google.com/gsi/client" async></script>

          <div id="g_id_onload"
            data-client_id="614116390287-toeb1trkh4bs40q8evalqjonftj4tahm.apps.googleusercontent.com"
            data-login_uri="http://localhost/camila/Brainway/auth/login/form.php" data-auto_prompt="false"
            data-cancel_on_tap_outside="false">
          </div>

          <!-- STYLE -->
          <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline" data-text="sign_in_with"
            data-shape="rectangular" data-logo_alignment="right">
          </div>

          <!-- STYLE -->
          <!-- <div class="g_id_signin"
         data-type="icon"
         data-shape="circle"
         data-theme="outline"
         data-text="signin_with"
         data-size="large"
         data-locale="pt-BR">
        </div> -->

          <a href="../cadastro/index.html">Não possui cadastro no Brainway?<span> Cadastro.</span> </a>
        </div>
      </div>
    </div>
  </main>

</body>

</html>