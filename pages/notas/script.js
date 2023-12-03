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
  // Exibir um alerta de confirmação
  const isConfirmed = window.confirm("Tem certeza que deseja excluir esta nota?");

  // Se o usuário confirmar, proceda com a exclusão
  if (isConfirmed) {
      const url = 'delete.php';
      const data = new URLSearchParams();
      data.append('note_id', noteId);

      fetch(url, {
          method: 'POST',
          body: data,
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
      })
      .then(response => response.text())
      .then(result => {
          console.log(result);
          loadNotes(); // Atualize a interface do usuário após a exclusão bem-sucedida
      })
      .catch(error => {
          console.error('Erro na solicitação:', error);
      });
  }
}


function updateNote(noteId, title, filterDesc) {

  const url = 'update.php';

  // Dados a serem enviados para o servidor
  const data = new URLSearchParams();
  data.append('noteId', noteId);
  data.append('title', title);
  data.append('filterDesc', filterDesc);

  // Configuração da solicitação Fetch
  fetch(url, {
      method: 'POST',
      body: data,
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
  })
  .then(response => response.text())
  .then(result => {
      // Exiba a resposta ou faça algo com ela
      console.log(result);

      // Atualize a interface do usuário conforme necessário
      // Por exemplo, recarregue as notas após a atualização bem-sucedida
      loadNotes();
  })
  .catch(error => {
      // Lida com erros na solicitação
      console.error('Erro na solicitação:', error);
  });

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
        loadNotes(); // Atualiza as notas após o sucesso
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

// Função loadNotes() para carregar as notas quando a página for carregada
document.addEventListener('DOMContentLoaded', function () {
  loadNotes();
});