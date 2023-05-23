<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit;
}
?>

<!-- Código HTML para exibir a lista de tarefas -->
<h2>Lista de Tarefas</h2>

<table class="table">
    <thead>
        <tr>
            <th>Nome da Tarefa</th>
            <th>Descrição da Tarefa</th>
            <th>Data de Criação</th>
            <th>Data de Conclusão</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Consulta no banco de dados para obter as tarefas
        $query = "SELECT * FROM tarefas";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $taskId = $row['id'];
            $taskName = $row['nome'];
            $taskDescription = $row['descricao'];
            $taskCreationDate = $row['data_criacao'];
            $taskCompletionDate = $row['data_conclusao'];
            $taskStatus = $row['status'];

            // Lógica para definir a cor da linha da tarefa com base no status
            $rowColor = $taskStatus == 'Concluído' ? 'green' : 'white';

            echo "<tr style='background-color: $rowColor;'>";
            echo "<td>$taskName</td>";
            echo "<td>$taskDescription</td>";
            echo "<td>$taskCreationDate</td>";
            echo "<td>$taskCompletionDate</td>";
            echo "<td>$taskStatus</td>";
            echo "<td>
                    <a href='edit_task.php?id=$taskId'>Editar</a> |
                    <a href='delete_task.php?id=$taskId'>Excluir</a>
                    <a href="report.php" target="_blank">Gerar Relatório</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<!-- Botão para abrir o modal de criação de tarefa -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTaskModal">
    Criar Tarefa
</button>

<!-- Modal de criação de tarefa -->
<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Criar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="create_task.php" method="POST">
                    <div class="form-group">
                        <label for="taskName">Nome da Tarefa:</label>
                        <input type="text" class="form-control" id="taskName" name="taskName" required>
                    </div>
                    <div class="form-group">
                        <label for="taskDescription">Descrição da Tarefa:</label>
                        <textarea class="form-control" id="taskDescription" name="taskDescription" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

