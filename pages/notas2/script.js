const addBox = document.querySelector(".add-box"),
  popupBox = document.querySelector(".popup-box"),
  popupTitle = popupBox.querySelector("header p"),
  closeIcon = popupBox.querySelector("header i"),
  titleTag = popupBox.querySelector("input"),
  descTag = popupBox.querySelector("textarea"),
  addBtn = popupBox.querySelector("button");
  
  const months = [
    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro",
  ];
  

// const notes = JSON.parse(localStorage.getItem("notes") || "[]");
let isUpdate = false,
  updateId;

addBox.addEventListener("click", () => {
  // popupTitle.innerText = "a";
  addBtn.innerText = "Adicionar nota";
  popupBox.classList.add("show");
  document.querySelector("body").style.overflow = "hidden";
  if (window.innerWidth > 660) titleTag.focus();
});

closeIcon.addEventListener("click", () => {
  isUpdate = false;
  titleTag.value = descTag.value = "";
  popupBox.classList.remove("show");
  document.querySelector("body").style.overflow = "auto";
});

function showMenu(elem) {
  elem.parentElement.classList.add("show");
  document.addEventListener("click", (e) => {
    if (e.target.tagName != "I" || e.target != elem) {
      elem.parentElement.classList.remove("show");
    }
  });
}

function deleteNote(noteId) {
  let confirmDel = confirm("Deseja deletar?");
  if (!confirmDel) return;
  notes.splice(noteId, 1);
  localStorage.setItem("notes", JSON.stringify(notes));
  // showNotes();
}

function updateNote(noteId, title, filterDesc) {
  let description = filterDesc.replaceAll("<br/>", "\r\n");
  updateId = noteId;
  isUpdate = true;
  addBox.click();
  titleTag.value = title;
  descTag.value = description;
  // popupTitle.innerText = "";
  addBtn.innerText = "Atualizar nota";
}


addBtn.addEventListener("click", (e) => {
  e.preventDefault();
  let title = titleTag.value.trim(),
    description = descTag.value.trim();

  if (title || description) {
    let currentDate = new Date(),
      month = months[currentDate.getMonth()],
      day = currentDate.getDate(),
      year = currentDate.getFullYear();

    let noteInfo = { title, description, date: `${month} ${day}, ${year}` };
    closeIcon.click();
    saveNoteToServer(noteInfo);
  }

});

function saveNoteToServer(noteInfo) {
  const url = 'notes.php';

  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // Sucesso na comunicação com o servidor
        loadNotes(); // Atualiza as notas após o sucesso/        closeIcon.click();
      } else {
        // Tratamento de erro
        console.error('Erro na comunicação com o servidor');
      }
    }
  };

  const params = `title=${encodeURIComponent(noteInfo.title)}&description=${encodeURIComponent(noteInfo.description)}`;
  xhr.send(params);
}


function loadNotes() {
  const xhr = new XMLHttpRequest();
  const url = 'load.php'; // Nome do arquivo PHP que recuperará as notas

  xhr.open('GET', url, true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const notesContainer = document.getElementById('notes-container');
      notesContainer.innerHTML = xhr.responseText; // Atualiza o conteúdo do contêiner com as notas
    }
  };

  xhr.send();
}

// Chame a função loadNotes() para carregar as notas quando a página for carregada
document.addEventListener('DOMContentLoaded', function () {
  loadNotes();
});