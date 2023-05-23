<?php
session_start();
require_once 'db_config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$taskName = $_POST['taskName'];
$taskDescription = $_POST['taskDescription'];

// Insere a nova tarefa no banco de dados
$query = "INSERT INTO tarefas (nome, descricao, data_criacao, status) VALUES ('$taskName', '$taskDescription', NOW(), 'Pendente')";
mysqli_query($conn, $query);

header('Location: home.php'); // Redireciona de volta para a página principal após a criação da tarefa
?>
