<?php
$dsn = 'mysql:host=localhost;dbname=eventos;charset=utf8';
$username = 'root'; // Altere conforme necessário
$password = ''; // Altere conforme necessário

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
