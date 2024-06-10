<?php
$host = 'roundhouse.proxy.rlwy.net:50680';
$user = 'root';
$pass = 'gZBBsxlYtClRwZbwORrnCgVVkmUSpqSu';
$db = 'railway';


try{
    $connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

    if($connection = true){
        echo 'Goood Morning Night City';
    }
    
}catch(Exception $e){
    echo $e->getMessage()."F";
}
?>