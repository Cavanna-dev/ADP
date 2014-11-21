<?php

include_once 'config.php';

$host   = 'localhost';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . CONST_DATABASE_NAME, CONST_DATABASE_USER, CONST_DATABASE_PWD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>