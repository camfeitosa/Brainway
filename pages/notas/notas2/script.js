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
const notes = JSON.parse(localStorage.getItem("notes") || "[]");
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

function showNotes() {
  if (!notes) return;
  document.querySelectorAll(".note").forEach((li) => li.remove());
  notes.forEach((note, id) => {
    if (note) {
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
      addBox.insertAdjacentHTML("afterend", liTag);
    }
  });

  showNotes();

  function showMenu(elem) {
    elem.parentElement.classList.add("show");
    document.addEventListener("click", (e) => {
      if (e.target.tagName != "I" || e.target != elem) {
        elem.parentElement.classList.remove("show");
      }
    });
  }

  showMenu();

  function deleteNote(noteId) {
    let confirmDel = confirm("Deseja deletar?");
    if (!confirmDel) return;
    notes.splice(noteId, 1);
    localStorage.setItem("notes", JSON.stringify(notes));
    showNotes();
  }
  deleteNote();

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
  updateNote();

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
        notes.push(noteInfo);
      } else {
        isUpdate = false;
        notes[updateId] = noteInfo;
      }
      localStorage.setItem("notes", JSON.stringify(notes));
      showNotes();
      closeIcon.click();
      saveNoteToServer(noteInfo);
    }
  });

  function saveNoteToServer(noteInfo) {
    const url = "notes.php";

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          // Sucesso na comunicação com o servidor
          loadNotes(); // Atualiza as notas após o sucesso
          closeIcon.click();
        } else {
          // Tratamento de erro
          console.error("Erro na comunicação com o servidor");
        }
      }
    };

    const params = `title=${encodeURIComponent(
      noteInfo.title
    )}&description=${encodeURIComponent(noteInfo.description)}`;
    xhr.send(params);
  }

  // Função para carregar e exibir as notas do usuário

  function loadNotes() {
    const xhr = new XMLHttpRequest();
    const url = "load.php"; // Nome do arquivo PHP que recuperará as notas

    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        const notesContainer = document.getElementById("notes-container");
        notesContainer.innerHTML = xhr.responseText; // Atualiza o conteúdo do contêiner com as notas
      }
    };

    xhr.send();
  }

  // Chame a função loadNotes() para carregar as notas quando a página for carregada
  document.addEventListener("DOMContentLoaded", function () {
    loadNotes();
  });
}
