<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <div class="logo">
      <img src="img/logo.svg" alt="">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                  <path d="M12.5003 16.2988C13.8024 16.2988 14.9092 15.8613 15.8206 14.9863C16.7321 14.1113 17.1878 13.0488 17.1878 11.7988C17.1878 10.5488 16.7321 9.48633 15.8206 8.61133C14.9092 7.73633 13.8024 7.29883 12.5003 7.29883C11.1982 7.29883 10.0915 7.73633 9.18001 8.61133C8.26855 9.48633 7.81283 10.5488 7.81283 11.7988C7.81283 13.0488 8.26855 14.1113 9.18001 14.9863C10.0915 15.8613 11.1982 16.2988 12.5003 16.2988ZM12.5003 14.4988C11.7191 14.4988 11.055 14.2363 10.5081 13.7113C9.96126 13.1863 9.68783 12.5488 9.68783 11.7988C9.68783 11.0488 9.96126 10.4113 10.5081 9.88633C11.055 9.36133 11.7191 9.09883 12.5003 9.09883C13.2816 9.09883 13.9456 9.36133 14.4925 9.88633C15.0394 10.4113 15.3128 11.0488 15.3128 11.7988C15.3128 12.5488 15.0394 13.1863 14.4925 13.7113C13.9456 14.2363 13.2816 14.4988 12.5003 14.4988ZM12.5003 19.2988C9.9656 19.2988 7.65658 18.6197 5.57324 17.2613C3.48991 15.903 1.97949 14.0822 1.04199 11.7988C1.97949 9.51549 3.48991 7.69466 5.57324 6.33633C7.65658 4.97799 9.9656 4.29883 12.5003 4.29883C15.035 4.29883 17.3441 4.97799 19.4274 6.33633C21.5107 7.69466 23.0212 9.51549 23.9587 11.7988C23.0212 14.0822 21.5107 15.903 19.4274 17.2613C17.3441 18.6197 15.035 19.2988 12.5003 19.2988ZM12.5003 17.2988C14.4621 17.2988 16.2633 16.803 17.904 15.8113C19.5446 14.8197 20.7989 13.4822 21.667 11.7988C20.7989 10.1155 19.5446 8.778 17.904 7.78633C16.2633 6.79466 14.4621 6.29883 12.5003 6.29883C10.5385 6.29883 8.7373 6.79466 7.09668 7.78633C5.45605 8.778 4.20171 10.1155 3.33366 11.7988C4.20171 13.4822 5.45605 14.8197 7.09668 15.8113C8.7373 16.803 10.5385 17.2988 12.5003 17.2988Z" fill="black" fill-opacity="0.8"/>
                </svg>
              </div>

              <a href="esqueceu.php">Esqueceu sua senha?</a>
              <div>
                <button class="btn-login" type="submit">Entrar</button>
              </div>
              </form>
          </div>
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
        <!-- STYLE -->
        <!-- <div class="g_id_signin"
         data-type="icon"
         data-shape="circle"
         data-theme="outline"
         data-text="signin_with"
         data-size="large"
         data-locale="pt-BR">
        </div> -->
        <div class="link-log">
          <a href="../cadastro/index.html">Não possui cadastro no Brainway?<span> Cadastro.</span> </a>
        </div>
      </div>
    </div>
    </div>
  </main>

</body>

</html>