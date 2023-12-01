document.addEventListener("DOMContentLoaded", function() {
    const tarefas = document.getElementById("tarefas");
    const completasDropdown = document.getElementById("completasDropdown");
    
    tarefas.addEventListener("click", function(event) {
        if (event.target.tagName === "LI") {
            event.target.classList.toggle("completa");
        }
    });
    
    document.getElementById("dropdownBtn").addEventListener("click", function() {
        completasDropdown.innerHTML = "";
        const completas = tarefas.querySelectorAll(".completa");
        
        if (completas.length === 0) {
            completasDropdown.textContent = "Nenhuma tarefa completa.";
        } else {
            completas.forEach(function(tarefa) {
                const clone = tarefa.cloneNode(true);
                completasDropdown.appendChild(clone);
            });
        }
        
        completasDropdown.style.display = "block";
    });
});
