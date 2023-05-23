<?php
session_start();
require_once 'db_config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Verifica se o ID da tarefa foi fornecido
if (!isset($_GET['id'])) {
    header('Location: home.php');
    exit;
}

$taskId = $_GET['id'];

// Consulta o banco de dados para obter os dados da tarefa correspondente ao ID
$query = "SELECT * FROM tasks WHERE id = $taskId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Verifica se a tarefa existe
if (!$row) {
    header('Location: home.php');
    exit;
}

// Verifica se o formulário foi enviado para atualizar a tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];

    // Atualiza os dados da tarefa no banco de dados
    $updateQuery = "UPDATE tasks SET name = '$taskName', description = '$taskDescription' WHERE id = $taskId";
    mysqli_query($conn, $updateQuery);

    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
    <!-- Adicione os links para os arquivos CSS e JavaScript necessários -->
</head>
<body>
    <h2>Editar Tarefa</h2>
    <form method="POST" action="">
        <div>
            <label for="taskName">Nome da Tarefa:</label>
            <input type="text" name="taskName" id="taskName" value="<?php echo $row['name']; ?>" required>
        </div>
        <div>
            <label for="taskDescription">Descrição da Tarefa:</label>
            <textarea name="taskDescription" id="taskDescription" required><?php echo $row['description']; ?></textarea>
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>
