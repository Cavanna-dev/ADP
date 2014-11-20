<?php

$host   = 'localhost';
$dbName = 'adp';
$user   = 'root';
$pass   = '';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>