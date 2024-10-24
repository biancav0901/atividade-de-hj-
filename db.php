<?php
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$db = 'Industria'; // nome do banco de dados
$user = 'seu_usuario'; // seu usuário do banco de dados
$pass = 'sua_senha'; // sua senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>

