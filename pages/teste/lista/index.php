<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Tarefas</title>
</head>
<body>
    <main>
        <div class="container-roll">
            <form id="taskForm">   
                <div class="titulo">
                    <label for="titulo">Título</label>    
                    <input type="text" id="titulo" name="titulo">
                </div>
            
                <div class="wrapper-task">
                    <button type="button" onclick="adicionarTarefa()">Adicionar Tarefa</button>
                </div>
            </form>

            <div id="lista-tarefas">
                <!-- Lista de tarefas será exibida aqui -->
            </div>
        </div>

        <script src="script.js"></script>
    </main>
</body>
</html>
