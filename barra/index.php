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

                // Exibir mensagem e zerar a barra se atingir o valor máximo
                if (pontuacao >= valorMaximo) {
                    alert("Parabéns! Você atingiu o valor máximo da barra!");
                    // Zerar a barra
                    progressBar.style.width = "0%";
                }
            }
        };
        xhr.open("GET", "obter_pontuacao.php", true);
        xhr.send();
    }

    setInterval(atualizarProgressBar, 5000);
    atualizarProgressBar();
</script>


<?php
}
?>
    <!-- <h2>Pontuação Atual</h2> -->
    <div id="progress-bar">
        <div id="barra-progresso"></div>
    </div>
</body>
</html>
