<?php
session_start();
require_once 'db_config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Consulta no banco de dados para verificar as credenciais do usuário
$query = "SELECT * FROM usuarios WHERE email = '$username' AND senha = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Autenticação bem-sucedida
    $_SESSION['username'] = $username;
    header('Location: home.php'); // Redireciona para a página principal após o login
} else {
    // Autenticação falhou
    $_SESSION['login_error'] = 'Usuário ou senha inválidos';
    header('Location: login.php'); // Redireciona de volta para a página de login com mensagem de erro
}
?>
