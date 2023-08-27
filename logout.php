<?php
// Iniciar a sessão 
session_start();

// Destruir a sessão
session_destroy();

// Redirecionar para página de login
header("Location: login/form.html");
exit();
?>
