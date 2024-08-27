<?php
$host = 'localhost';
$dbname = 'mantenimiento_alumnos';
$username = 'root';
$password = '';
//inicia captacion de la base de datos con el try catch
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
