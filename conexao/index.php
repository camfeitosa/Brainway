<h1> Formulário de registro HTML </h1>

<form method="POST" action="salvar.php">
  <label for="usuario">Username:</label>
  <input type="text" placeholder="Nome de usuario" id="usuario" value="@" name="usuario" required>

  <br>

  <label for="nome">Nome:</label>
  <input type="text" placeholder="Digite seu nome" id="nome" name="nome" required>

  <br>

  <label for="email">Email:</label>
  <input type="email" placeholder="Digite seu email" id="email" name="email" required>

  <br>

  <label for="senha">Senha:</label>
  <input type="password" placeholder="Digite seu senha" id="senha" name="senha" required>

  <br><br>

  <button type="submit">Registrar</button>
</form>