document.addEventListener('DOMContentLoaded', function () {
    var pontuacao = document.getElementById('pontuacao-valor').textContent;
    var pontuacaoBarra = document.getElementById('pontuacao');

    // Define a largura da barra com base na pontuação (exemplo: pontuação máxima de 100)
    var larguraBarra = (pontuacao / 100) * 100;
    pontuacaoBarra.style.width = larguraBarra + '%';
});
