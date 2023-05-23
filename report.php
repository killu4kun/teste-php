<?php
session_start();
require_once 'db_config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Define o nome do arquivo
$filename = 'relatorio_agendas_tarefas.csv';

// Define o cabeçalho do arquivo CSV
$header = array('Nome da Tarefa', 'Descrição da Tarefa', 'Data de Criação', 'Data de Conclusão', 'Status');

// Cria um stream para a saída do arquivo CSV
$stream = fopen('php://output', 'w');

// Escreve o cabeçalho no stream
fputcsv($stream, $header);

// Consulta o banco de dados para obter os dados das tarefas
$query = "SELECT * FROM tasks";
$result = mysqli_query($conn, $query);

// Escreve os dados das tarefas no stream
while ($row = mysqli_fetch_assoc($result)) {
    $data = array(
        $row['name'],
        $row['description'],
        $row['creation_date'],
        $row['completion_date'],
        $row['status']
    );
    fputcsv($stream, $data);
}

// Fecha o stream
fclose($stream);

// Define os cabeçalhos para forçar o download do arquivo CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Saída direta para o navegador
readfile($filename);
