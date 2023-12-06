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
const quiz = document.getElementById("quiz");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const c_text = document.getElementById("c_text");
// const d_text = document.getElementById("d_text");
const submitBtn = document.getElementById("botao");
const answersEls = document.querySelectorAll(".answer");
let currentQuiz = 0;
let score = 0;
loadQuiz();



function startQuiz(){
    quiz.innerHTML = `<h2>Esse quiz contém 5 perguntas gerais sobre o Murilo</h2> <button onclick="loadQuiz()">Clique aqui para começar o quiz</button>`
}

function loadQuiz() {
deselectAnswers();
const currentQuizData = quizData[currentQuiz];
questionEl.innerHTML = currentQuizData.question;
a_text.innerText = currentQuizData.a
b_text.innerText = currentQuizData.b
c_text.innerText = currentQuizData.c
// d_text.innerText = currentQuizData.d

}

function getSelected() {

let answer = undefined;
answersEls.forEach((answerEl) => {
    if (answerEl.checked) {
        answer = answerEl.id;
    }
});
return answer
}

function deselectAnswers() {
answersEls.forEach((answerEl) => {
    if (answerEl.checked) {
        answerEl.checked = false;
    }
});
}
submitBtn.addEventListener('click', () => {
//check to see the answer
const answer = getSelected();
console.log(answer)
if (answer) {
    if (answer === quizData[currentQuiz].correct) {
        score++
    }
    currentQuiz++
    if (currentQuiz < quizData.length) {
        loadQuiz();
    } else {
        quiz.innerHTML = `<h2>Você acertou ${score}/${quizData.length} perguntas </h2> <button onclick="location.reload()">Clique aqui para refazer o quiz</button>`
    }
}

})