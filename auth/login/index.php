<html>
<head>
  <title>Login</title>
  <meta charset="UTF-8"/>
</head>
<body>

<h1> Formulário login </h1>

 
<form method="POST" action="validar.php">
  <label for="usuario">Nome de usuário ou email:</label>
  <input type="text" placeholder="Nome de usuario ou email" id="usuario" name="usuario" required>

  <br>

  <label for="senha">Senha:</label>
  <input type="password" placeholder="Digite seu senha" id="senha" name="senha" required>

  <br><br>

  <button type="submit">Login</button>
  <script src="https://accounts.google.com/gsi/client" async></script>
  
  <div id="g_id_onload"
      data-client_id="614116390287-toeb1trkh4bs40q8evalqjonftj4tahm.apps.googleusercontent.com"
      data-login_uri="http://localhost/Brainway/auth/login/form.php"
      data-auto_prompt="false"
      data-cancel_on_tap_outside="false">
  </div>
  
  <!-- STYLE -->
  <div class="g_id_signin"
      data-type="standard"
      data-size="large"
      data-theme="outline"
      data-text="sign_in_with"
      data-shape="rectangular"
      data-logo_alignment="left">
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
</form>

<a href="../cadastro/index.html">Cadastre-se</a>

</body>
</html>