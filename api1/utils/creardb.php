<?php


$dsn = "mysql:host=localhost;";
$user = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = file_get_contents('db.sql');

if ($sql === false) die("No se pudo cargar el archivo SQL.");

try {
    $pdo->exec($sql);
    echo "Archivo SQL ejecutado con éxito.";
} catch (PDOException $e) {
    echo "Error ejecutando el archivo SQL: " . $e->getMessage();
}

?>