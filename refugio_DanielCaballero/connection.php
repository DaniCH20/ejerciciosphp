<?php

$host = 'localhost:3306';
$dbname = 'exam_refugio';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $miPDO = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    error_log('DB Error de Conexion: ' . $e->getMessage());
    die('Ezin izan da datu-basearekin konektatu.');
}

?>