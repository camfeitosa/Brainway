<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style_l.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style_l2.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style_h.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style_c.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css">
    <link rel="icon" type="imagem/png" href="../assets/images/alt_logo.png" />
</head>

<body>

    <header>
        <img src="../assets/images/logo.png" class="logo" alt="logo">
        <nav>
            <ul class="nav-links">
                <li><a href="tarefas/index.php">Tarefas</a></li>
                <li><a href="conquistas/index.php">Conquistas</a></li>
                <li><a href="loja/index.php">Loja</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
        <div class="main">
        <a href="../logout.php"><img src="out.png" class="img-menu2"></a>
            <a href="alterar/index.php"><img src="../assets/images/perfil.png" class="img-menu"></a>
        </div>
        <div class="bx bx-menu" id="menu-icon"></div>
        <!--js link-->
        <script type="text/javascript" src="../assets/js/script.js"></script>
    </header>
    <div class="container">
        <div class="contato">
            <div class="cot-content">
                <div class="cot-txt">
                    <h1>Estamos aqui para você</h1>
                    <p>Tem alguma pergunta ou sugestão? Deixe-nos saber como podemos ajudar. Sua opinião é importante
                        para nós!</p>
                    <form method="POST" action="../public/salvar.php">
                        <label for="nome">Nome:</label>
                        <input type="text" placeholder="Digite seu nome" id="nome" name="nome" required class="campo">
                        <br>
                        <label for="email">Email:</label>
                        <input type="text" placeholder="Digite seu email" id="email" name="email" required
                            class="campo">
                        <br>
                        <label for="assunto">Assunto:</label>
                        <input type="text" id="assunto" name="assunto" required class="campo2">
                        <br>
                        <button type="submit" class="botao">Enviar mensagem</button>
                    </form>
                </div>
                <div class="cot-img">
                    <img src="../assets/images/contato.png" alt="">
                    <div class="icons">
                        <a href="https://www.facebook.com/profile.php?id=61554606021002"><i
                                class="fa-brands fa-square-facebook"></i></a>
                        <a href="https://twitter.com/brain_way_"><i class="fa-brands fa-square-twitter"></i></a>
                        <a href="https://www.instagram.com/brainway_/"><i class="fa-brands fa-square-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div onclick="scrollToTop()" class="scroll-top">
        <img src="../assets/images/alt_logo.png">
    </div>
    
<!-- 
    <footer>
        <img src="../assets/images/cidade.png" class="cidade">
        <div class="footer-prct">
            <div class="footer-content">
                <ul class="footer-list">
                    <li>
                        <h3>Produto</h3>
                    </li>
                    <li>
                        <a href="./index.html" class="footer-link">Home</a>
                    </li>
                    <li>
                        <a href="./funcionalidades.html" class="footer-link">Funcionalidades</a>
                    </li>
                    <li>
                        <a href="./contato.html" class="footer-link">Fale Conosco</a>
                    </li>
                    <li>
                        <a href="./sobrenos.html" class="footer-link">Sobre Nós</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <li>
                        <h3>Funcionalidades</h3>
                    </li>
                    <li>
                        <a href="./funcionalidades.html#pomodoro" class="footer-link">Pomodoro</a>
                    </li>
                    <li>
                        <a href="./funcionalidades.html#lista" class="footer-link">A Fazer</a>
                    </li>
                    <li>
                        <a href="./funcionalidades.html#cronograma" class="footer-link">Cronograma</a>
                    </li>
                    <li>
                        <a href="./funcionalidades.html#notas" class="footer-link">Notas</a>
                    </li>
                </ul>
                <ul class="footer-list">
                    <li>
                        <h3>Desenvolvedores</h3>
                    </li>
                    <li>
                        <a href="./sobrenos.html#desenvolvedores" class="footer-link">Camila Feitosa</a>
                    </li>
                    <li>
                        <a href="./sobrenos.html#desenvolvedores" class="footer-link">Gabryelle Sousa</a>
                    </li>
                    <li>
                        <a href="./sobrenos.html#desenvolvedores" class="footer-link">Raissa Silva</a>
                    </li>
                </ul>
                <div class="footer-subscribe">
                    <img src="../assets/images/bloco.png" class="bloco">
                </div>
            </div>
        </div>
        <div class="footer-prct2">
            <div class="footer-content2">
                <ul class="footer-list2">
                    <li>
                        <p>Transformando a produtividade com gamificação. Desenvolvido por estudantes do terceiro ano do
                            ensino médio integrado ao ensino técnico como parte de seu projeto de conclusão de curso.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="footer-copyright">
            <div class="footer-cpyd">
                <img src="../assets/images/logo_branca.png" class="imgbloco">

                <div class="icons2">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-square-twitter"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                </div>
            </div>
        </div>
    </footer> -->

</body>

</html>
