<?php
$host = 'roundhouse.proxy.rlwy.net:50680';
$user = 'root';
$pass = 'gZBBsxlYtClRwZbwORrnCgVVkmUSpqSu';
$db = 'railway';


try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $connection = new PDO($dsn, $user, $pass);
    
    echo 'REALIZADO POR: Julian Llugany y Agustin Verzino Fernandez';
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
}
?>