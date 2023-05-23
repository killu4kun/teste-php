<?php
$hostname = 'localhost';
$username = 'root';
$password = '123456';
$database = 'agenda_tarefas';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
