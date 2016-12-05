<?php
$host = 'localhost';
$db = 'auth';
$user = 'root';
$pass = '';
$pdo = "mysql:host=$host;dbname=$db";
try {
    $pdo = new PDO($pdo, $user, $pass);
} catch (PDOException $e) {
    die("Нет подключения к DB" . $e->getMessage());
}
