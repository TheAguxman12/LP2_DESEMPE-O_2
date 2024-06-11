<?php
$host = 'roundhouse.proxy.rlwy.net:50680';
$user = 'root';
$pass = 'gZBBsxlYtClRwZbwORrnCgVVkmUSpqSu';
$db = 'railway';


try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $connection = new PDO($dsn, $user, $pass);
    
    // Esto es solo para pruebas, quítalo en producción
    echo 'Good Morning Night City';
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>