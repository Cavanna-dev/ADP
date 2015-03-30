<?php

include_once 'config.php';

$host   = 'localhost';

try {
    $db = new PDO('mysql:host=' . $host . ';dbname=' . CONST_DATABASE_NAME, CONST_DATABASE_USER, CONST_DATABASE_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>