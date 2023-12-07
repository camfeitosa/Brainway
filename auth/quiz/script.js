const quizData = [{
    question: 'Você costuma adiar tarefas ou projetos importantes?',
    a: 'Sim, com frequência.',
    b: 'Às vezes, quando sinto dificuldade ou falta de motivação.',
    c: 'Raramente, costumo ser bastante disciplinado(a) com minhas tarefas.',
    correct: 'c'
},
{
    question: 'Você encontra dificuldades para iniciar suas atividades acadêmicas?',
    a: 'Sim, é uma tarefa desafiadora para mim.',
    b: 'Às vezes, dependendo da complexidade ou do interesse da tarefa.',
    c: 'Não, geralmente consigo começar minhas atividades sem muita dificuldade.',
    correct: 'a'
},
{
    question: 'Como você descreveria sua habilidade em estabelecer metas e prioridades?',
    a: 'Tenho dificuldades em definir metas claras e estabelecer prioridades.',
    b: 'Às vezes, sinto-me indeciso(a) sobre as metas e prioridades corretas.',
    c: 'Sou bom(a) em estabelecer metas e prioridades de maneira eficaz.',
    correct: 'b'
},
{
    question: 'Você   costuma   sentir   ansiedade,   culpa   ou   frustração   relacionadas   à procrastinação?',
    a: 'Sim, esses sentimentos são frequentes para mim.',
    b: 'Às vezes, dependendo da importância da tarefa.',
    c: 'Não, geralmente não sinto esses sentimentos em relação à procrastinação.',
    correct: 'd'
},
{
    question: 'Como você lida com prazos?',
    a: 'Costumo  deixar  tudo  para  última  hora  e  sinto  uma  pressão  intensa  para cumprir os prazos.',
    b: 'Consigo  cumprir  os  prazos,  mas  muitas  vezes  deixo  para  fazer  as  tarefas mais perto da data limite.',
    c: "Sou disciplinado(a) e me planejo com antecedência, cumprindo os prazos de forma consistente.",
    correct: 'b'
},
]

const questionEl = document.getElementById("question");
const progressBar = document.getElementById("progress-bar");
const answersEls = document.querySelectorAll(".answer");
const submitBtn = document.getElementById("botao");
let currentQuiz = 0;
let selectedAnswers = {};

function loadQuiz() {
    const currentQuizData = quizData[currentQuiz];
    questionEl.innerHTML = currentQuizData.question;
    document.getElementById("a_text").innerText = currentQuizData.a;
    document.getElementById("b_text").innerText = currentQuizData.b;
    document.getElementById("c_text").innerText = currentQuizData.c;
}

function getSelected() {
    let answer = undefined;
    answersEls.forEach((answerEl) => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

function updateProgressBar() {
    const progress = ((currentQuiz + 1) / quizData.length) * 100;
    progressBar.style.width = `${Math.min(progress, 100)}%`; // Garante que a barra não ultrapasse 100%
}

function finishQuiz() {
    const optionCounts = { a: 0, b: 0, c: 0 };

    for (let key in selectedAnswers) {
        const selectedOption = selectedAnswers[key];
        optionCounts[selectedOption]++;
    }

    let maxSelectedOption = '';
    let maxCount = 0;

    for (let option in optionCounts) {
        if (optionCounts[option] > maxCount) {
            maxSelectedOption = option;
            maxCount = optionCounts[option];
        }
    }

    const resultMessage = `A opção mais selecionada foi: ${maxSelectedOption.toUpperCase()} com ${maxCount} votos.`;
    alert(resultMessage);
}

loadQuiz();

submitBtn.addEventListener('click', () => {
    const answer = getSelected();
    if (answer) {
        selectedAnswers[currentQuiz] = answer;
        currentQuiz++;
        updateProgressBar();

        if (currentQuiz < quizData.length) {
            loadQuiz();
        } else {
            finishQuiz();
        }
    }
});