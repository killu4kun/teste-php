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

// Verifica se a tarefa existe no banco de dados
$query = "SELECT * FROM tasks WHERE id = $taskId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Verifica se a tarefa existe
if (!$row) {
    header('Location: home.php');
    exit;
}

// Exclui a tarefa do banco de dados
$deleteQuery = "DELETE FROM tasks WHERE id = $taskId";
mysqli_query($conn, $deleteQuery);

header('Location: home.php');
exit;
