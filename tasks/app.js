document.addEventListener("DOMContentLoaded", function () {
    loadTasks();
});

function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskText = taskInput.value.trim();

    if (taskText !== "") {
        saveTask(taskText);
        taskInput.value = "";
        loadTasks();
    }
}

function saveTask(taskText) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "backend.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };

    // Obtenha o ID do usuário do localStorage (você pode precisar ajustar isso conforme a autenticação do usuário)
    var userId = localStorage.getItem("userId");

    xhr.send("taskText=" + encodeURIComponent(taskText) + "&userId=" + encodeURIComponent(userId));
}


function loadTasks() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var tasks = JSON.parse(xhr.responseText);
            displayTasks(tasks);
        }
    };
    xhr.send();
}

function displayTasks(tasks) {
    var taskList = document.getElementById("taskList");
    taskList.innerHTML = "";

    tasks.forEach(function (task) {
        var taskItem = document.createElement("li");
        taskItem.textContent = task.text;

        if (task.completed) {
            taskItem.classList.add("completed");
        }

        var completeButton = document.createElement("button");
        completeButton.textContent = "Concluir";
        completeButton.onclick = function () {
            completeTask(task.id);
        };

        taskItem.appendChild(completeButton);
        taskList.appendChild(taskItem);
    });
}

function completeTask(taskId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "completeTask.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            loadTasks();
        }
    };
    xhr.send("taskId=" + encodeURIComponent(taskId));
}
