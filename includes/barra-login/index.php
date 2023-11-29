<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Barra de Progresso de Logins</title>
    <style>
        #progress-bar1 {
            background-color: #efefef;
            width: 125px;
            height: 14px;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            margin-top: 10px;
        }

        #barra-progresso1 {
            height: 20px;
            background-color: red;
            border-radius: 5px;
            transition: width 0.5s; /* Adiciona uma transição suave à largura da barra */
        }

        #mensagem1 {
            display: none;
            color: red;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['id_user'])) {
?>
    <script>
        function atualizarBarraDeProgresso() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var numLogins = parseInt(xhr.responseText);
                    var valorMaximo = 20; // Substitua pelo valor máximo esperado (neste caso, 50)

                    // Calcular a porcentagem
                    var porcentagem = (numLogins / valorMaximo) * 100;

                    // Limitar a porcentagem para não ultrapassar 100%
                    porcentagem = Math.min(100, porcentagem);

                    // Atualizar a barra de progresso
                    var progressBar = document.getElementById("barra-progresso");
                    progressBar.style.width = porcentagem + "%";

                    // Exibir mensagem se atingir o valor máximo
                    var mensagem = document.getElementById("mensagem");
                    if (numLogins >= valorMaximo) {
                        mensagem.style.display = "block";
                    } else {
                        mensagem.style.display = "none";
                    }
                }
            };
            xhr.open("GET", "numero_logins.php", true);
            xhr.send();
        }

        setInterval(atualizarBarraDeProgresso, 2000);
        atualizarBarraDeProgresso();
    </script>

<?php
}
?>

<div id="progress-bar1">
    <div id="barra-progresso1"></div>
</div>

<div id="mensagem1">Parabéns! Você atingiu o valor máximo de logins!</div>
</body>
</html>
