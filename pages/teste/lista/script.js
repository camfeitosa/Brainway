function adicionarTarefa() {
    // Obter o valor do campo de título
    var tituloTarefa = document.getElementById("titulo").value;

    // Verificar se o campo não está vazio
    if (tituloTarefa.trim() !== "") {
        // Criar um novo elemento de lista
        var novaTarefa = document.createElement("li");
        novaTarefa.textContent = tituloTarefa;

        // Adicionar a nova tarefa à lista
        document.getElementById("lista-tarefas").appendChild(novaTarefa);

        // Limpar o campo de título
        document.getElementById("titulo").value = "";
        
        // Enviar os dados para o servidor PHP usando AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "enviar.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("titulo=" + encodeURIComponent(tituloTarefa));
    } else {
        alert("Por favor, insira um título para a tarefa.");
    }
}
