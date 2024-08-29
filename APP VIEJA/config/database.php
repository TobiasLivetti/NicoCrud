<?php

$dsn = "mysql:host=localhost;dbname=crud"; //tipo del servidor(mySql), nom. host; dbname= modelo Vista Controlador
$user = "root";
$password = "";

try{ //intenta y devuelve los errores
    $pdo= new PDO($dsn, $user, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PERMITE QUE AL HABER UN ERROR SE LE PERMITE MANEJAR Y ME MUESTRE EL ERROR
} catch (PDOException $e){
    echo $e ->getMessage();
}





?>