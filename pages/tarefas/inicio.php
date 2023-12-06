<?php
// session_start();
include('../../config/conexao.php');

// Verifica se o usuário está logado
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Query SQL para selecionar tarefas apenas do usuário logado
    $sql = "SELECT * FROM task WHERE id_user = ? ORDER BY id ASC";
    
    // Preparação da declaração
    $stmt = mysqli_prepare($conexao, $sql);

    // Vincula o parâmetro e executa a consulta
    mysqli_stmt_bind_param($stmt, "i", $id_user);
    mysqli_stmt_execute($stmt);

    // Obtém resultados
    $result = mysqli_stmt_get_result($stmt);

    // Verifica se há resultados
    if ($result) {
        // Verifica se há pelo menos uma linha retornada
        if (mysqli_num_rows($result) > 0) {
            // Recupera todas as linhas como uma matriz associativa
            while ($row = mysqli_fetch_assoc($result)) {
                $tasks[] = $row;
            }
        }
        
        // Libera o resultado
        mysqli_free_result($result);
    }

    // Libera a declaração
    mysqli_stmt_close($stmt);
}

$tasks = isset($tasks) ? $tasks : [];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>To-do list</title>
</head>

<body>
    <div id="to_do">
        <h1>Lista de Tarefas</h1>


        <form action="actions/create.php" method="POST" class="to-do-form">
            <div class="container-add">
                <input id="input" type="text" name="description" placeholder="Adicionar tarefa" required>
                <button type="submit" class="form-button" autocomplete="off">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </form>

        <div id="tasks">
            <!-- <h2>Incomplete Tasks</h2> -->
            <?php foreach ($tasks as $task): ?>
                <?php if (!$task['completed']): ?>
                    <div class="task">
                        <input type="checkbox" name="progress" class="progress <?= $task['completed'] ? 'done' : '' ?>"
                            data-task-id="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?>>

                        <p class="task-description">
                            <?= $task['description'] ?>
                        </p>

                        <div class="task-actions">
                            <a class="action-button edit-button">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>

                            <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </div>

                        <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                            <input type="text" class="hidden" name="id" value="<?= $task['id'] ?>">
                            <input type="text" name="description" placeholder="Edite aqui" value="<?= $task['description'] ?>">
                            <button type="submit" class="form-button confirm-button">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach ?>

            <div class="concluidas">
                <div class="concluir">
                    <h2>Concluídas<i class="toggle-completed-tasks fa-solid fa-chevron-down"></i></h2>
                </div>
                <div class="completed-tasks-container hidden">
                    <?php foreach ($tasks as $task): ?>
                        <?php if ($task['completed']): ?>
                            <div class="task completed-task">
                                <input type="checkbox" name="progress" class="progress <?= $task['completed'] ? 'done' : '' ?>"
                                    data-task-id="<?= $task['id'] ?>" <?= $task['completed'] ? 'checked' : '' ?> disabled>

                                <p class="task-description">
                                    <?= $task['description'] ?>
                                </p>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <script src="src/javascript/script.js"></script>
    <script>
        $(document).ready(function () {
            // Adiciona um evento de clique à seta de alternância
            $('.toggle-completed-tasks').on('click', function () {
                // Encontra o contêiner de tarefas completas
                var completedTasksContainer = $('.completed-tasks-container');

                // Alterna a classe 'hidden' no contêiner de tarefas completas
                completedTasksContainer.toggleClass('hidden');

                // Atualiza o ícone da seta com base na visibilidade do contêiner
                var isHidden = completedTasksContainer.hasClass('hidden');
                $(this).toggleClass('fa-chevron-down', isHidden).toggleClass('fa-chevron-up', !isHidden);
            });
        });

         // Função para focar no input
        function focarNoInput() {
            // Obtenha o elemento de input pelo ID
            var inputElement = document.getElementById("input");

            // Verifique se o elemento de input existe antes de chamar focus
            if (inputElement) {
                // Aplica o foco no input
                inputElement.focus();
            }
        }

        // Chame a função ao carregar a página
        window.addEventListener("load", focarNoInput);

    </script>
</body>

</html>