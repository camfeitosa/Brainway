const addBox = document.querySelector(".add-box"),
  popupBox = document.querySelector(".popup-box"),
  popupTitle = popupBox.querySelector("header p"),
  closeIcon = popupBox.querySelector("header i"),
  titleTag = popupBox.querySelector("input"),
  descTag = popupBox.querySelector("textarea"),
  addBtn = popupBox.querySelector("button");

// No início do seu arquivo JavaScript ou em um script global
let isUpdate = false;


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
const notes = [];

addBox.addEventListener("click", () => {
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

function showNotes() {
  console.log(notes); // Verifique se os dados estão sendo recebidos
  const notesContainer = document.getElementById('notes-container');
  notesContainer.innerHTML = ""; // Limpa o conteúdo antes de adicionar as novas notas

  if (!notes) return;

  notes.forEach((note, id) => {
      let filterDesc = note.description.replaceAll("\n", "<br/>");
      let liTag = `<li class="note">
                      <div class="details">
                          <p>${note.title}</p>
                          <div class='desc'>${filterDesc}</div>
                      </div>
                      <div class="bottom-content">
                          <span>${note.date}</span>
                          <div class="settings">
                              <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                              <ul class="menu">
                                  <li onclick="updateNote(${id}, '${note.title}', '${filterDesc}')"><i class="uil uil-pen"></i>Editar</li>
                                  <li onclick="deleteNote(${id})"><i class="uil uil-trash"></i>Deletar</li>
                              </ul>
                          </div>
                      </div>
                  </li>`;
      notesContainer.insertAdjacentHTML("beforeend", liTag);
  });
}


showNotes();

function saveNoteToServer(noteInfo) {
  const url = 'note.php'; // Substitua 'save_note.php' pelo seu script PHP de salvamento
  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      loadNotes(); // Carrega as notas após uma resposta bem-sucedida
      closeIcon.click();
    }
  };
  const params = `title=${encodeURIComponent(noteInfo.title)}&description=${encodeURIComponent(noteInfo.description)}`;
  xhr.send(params);
}

function loadNotes() {
  const url = 'load.php'; // Substitua 'load_notes.php' pelo seu script PHP de carregamento
  const xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText); // Exiba a resposta no console
      let notes = JSON.parse(xhr.responseText);
      showNotes();
    }
  };
  xhr.send();
}

function updateNote(noteId, title, filterDesc) {
  let description = filterDesc.replaceAll("<br/>", "\r\n");
  isUpdate = true;
  addBox.click();
  titleTag.value = title;
  descTag.value = description;
  addBtn.innerText = "Atualizar nota";
}

function deleteNote(noteId) {
  let confirmDel = confirm("Deseja deletar?");
  if (!confirmDel) return;

  const url = 'delete.php'; // Substitua 'delete_note.php' pelo seu script PHP de exclusão
  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      loadNotes();
    }
  };
  const params = `note_id=${encodeURIComponent(noteId)}`;
  xhr.send(params);
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
    if (!isUpdate) {
      saveNoteToServer(noteInfo);
    } else {
      isUpdate = false;
      noteInfo.id = updateId; // Adicione o ID da nota para atualização
      updateNoteToServer(noteInfo);
    }
  }
});

function updateNoteToServer(noteInfo) {
  const url = 'update.php'; // Substitua 'update_note.php' pelo seu script PHP de atualização
  const xhr = new XMLHttpRequest();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      loadNotes();
      closeIcon.click();
    }
  };
  const params = `note_id=${encodeURIComponent(noteInfo.id)}&title=${encodeURIComponent(noteInfo.title)}&description=${encodeURIComponent(noteInfo.description)}`;
  xhr.send(params);
}
