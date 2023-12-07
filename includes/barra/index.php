<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Progress Bar</title>
    <style>
        #progress-bar {
            background-color: #efefef;
            width: 125px;
            height: 14px;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            margin-top: 10px;
        }

        #barra-progresso {
            height: 20px;
            background-color:#27AE61;
            border-radius: 5px;
            transition: width 0.5s; /* Adiciona uma transição suave à largura da barra */
        }
#imagem-comemorativa {
    display: none;
    width: 100px; /* Ajuste o tamanho conforme necessário */
    height: auto; /* Ajuste o tamanho conforme necessário */
    position: absolute;
    top: 50%; /* Posiciona a imagem no centro verticalmente */
    left: 50%; /* Posiciona a imagem no centro horizontalmente */
    transform: translate(-50%, -50%);
    z-index: 1000; /* Certifica-se de que a imagem está acima de outros elementos */
}



    </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['id_user'])) {
?>
    <script>
     function atualizarProgressBar() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var pontuacao = parseInt(xhr.responseText);
            var valorMaximo = 100; // Substitua pelo valor máximo esperado

            // Calcular a porcentagem
            var porcentagem = (pontuacao / valorMaximo) * 100;

            // Limitar a porcentagem para não ultrapassar 100%
            porcentagem = Math.min(100, porcentagem);

            // Atualizar a barra de progresso
            var progressBar = document.getElementById("barra-progresso");
            progressBar.style.width = porcentagem + "%";

            // Exibir mensagem e reiniciar a barra quando atingir o valor máximo
            var mensagem = document.getElementById("mensagem");
            var imagemComemorativa = document.getElementById("imagem-comemorativa");

            if (pontuacao == valorMaximo) {
                mensagem.style.display = "block";
                imagemComemorativa.style.display = "block";

                // Zerar a pontuação no banco de dados e adicionar moedas
                zerarPontuacaoEAdicionarMoedas();
            } else {
                mensagem.style.display = "none";
                imagemComemorativa.style.display = "none";
            }
        }
    };
    xhr.open("GET", "obter_pontuacao.php", true);
    xhr.send();
}

    </script>

<?php
}
?>

<div id="progress-bar">
    <div id="barra-progresso"></div>
</div>

<div id="mensagem">bidyevfc8ec9wjáximo da barra!</div>
<img id="imagem-comemorativa" src="../../includes/nivel.png" alt="Imagem Comemorativa" style="display: none;">


</body>
</html>
