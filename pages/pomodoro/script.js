const html = document.querySelector('html');
const focoBt = document.querySelector('.app__card-button--foco');
const curtoBt = document.querySelector('.app__card-button--curto');
const longoBt = document.querySelector('.app__card-button--longo');
const banner = document.querySelector('.app__image');
const titulo = document.querySelector('.app__title');
const botoes = document.querySelectorAll('.app__card-button');
const startPauseBt = document.querySelector('#start-pause');
const musicaFocoInput = document.querySelector('#alternar-musica');
const iniciarOuPausarBt = document.querySelector('#start-pause span');
const iniciarOuPausarBtIcone = document.querySelector(".app__card-primary-button-icon");  // Corrigi o nome da classe aqui
const tempoNaTela = document.querySelector('#timer');

const musica = new Audio('sons/luna-rise-part-one.mp3');
const audioPlay = new Audio('sons/play.wav');
const audioPausa = new Audio('sons/pause.mp3');
const audioTempoFinalizado = new Audio('sons/beep.mp3');

let tempoDecorridoEmSegundos = 1500;
let intervaloId = null;

musica.loop = true;

musicaFocoInput.addEventListener('change', () => {
    if (musica.paused) {
        musica.play();
    } else {
        musica.pause();
    }
});

focoBt.addEventListener('click', () => {
    tempoDecorridoEmSegundos = 1500;
    alterarContexto('foco');
    focoBt.classList.add('active');
});

curtoBt.addEventListener('click', () => {
    tempoDecorridoEmSegundos = 300;
    alterarContexto('descanso-curto');
    curtoBt.classList.add('active');
});

longoBt.addEventListener('click', () => {
    tempoDecorridoEmSegundos = 900;
    alterarContexto('descanso-longo');
    longoBt.classList.add('active');
});

function alterarContexto(contexto) {
    mostrarTempo();

    // Remover a classe 'active' de todos os botões
    botoes.forEach(function (botao) {
        botao.classList.remove('active');
    });

    // Definir o atributo 'data-contexto' no elemento HTML
    html.setAttribute('data-contexto', contexto);

    // Selecionar a div com a classe 'app__card'
    const appCard = document.querySelector('.app__card');

    // Definir a cor de fundo da div com base no contexto
    switch (contexto) {
        case "foco":
            appCard.style.backgroundColor = '#EB5262';
            break;
        case "descanso-curto":
            appCard.style.backgroundColor = '#45AAF2';
            break;
        case "descanso-longo":
            appCard.style.backgroundColor = '#2D99DA';
            break;
        default:
            break;
    }
}

const contagemRegressiva = () => {
    if (tempoDecorridoEmSegundos <= 0) {
        audioTempoFinalizado.play();
        alert('Tempo finalizado!');
        zerar();
        return;
    }
    tempoDecorridoEmSegundos -= 1;
    mostrarTempo();
};

startPauseBt.addEventListener('click', iniciarOuPausar);

function iniciarOuPausar() {
    if (intervaloId) {
        audioPausa.play();
        zerar();
        return;
    }
    audioPlay.play();
    intervaloId = setInterval(contagemRegressiva, 1000);
    iniciarOuPausarBt.textContent = "Pausar";
    // iniciarOuPausarBtIcone.setAttribute('src', `imagens/pause.png`);
}

function zerar() {
    clearInterval(intervaloId);
    iniciarOuPausarBt.textContent = "Começar";
    // iniciarOuPausarBtIcone.setAttribute('src', `imagens/play_arrow.png`);
    intervaloId = null;
}

function mostrarTempo() {
    const tempo = new Date(tempoDecorridoEmSegundos * 1000);
    const tempoFormatado = tempo.toLocaleTimeString('pt-Br', { minute: '2-digit', second: '2-digit' });
    tempoNaTela.innerHTML = `${tempoFormatado}`;
}

mostrarTempo();
