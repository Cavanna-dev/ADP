<?php

include_once './functions/hashagePass.php';
include_once './functions/connection_db.php';

$email    = htmlspecialchars($_POST['inputEmail']);
$password = hashagePass(htmlspecialchars($_POST['inputPassword'])); //Fonction functions/hashagePass.php

try {
    $resultats = $db->exec("INSERT INTO `customers`"
            . "(`id`, `email`, `password`) "
            . "VALUES (null,'".$email."','".$password."')");
    
    header('Location:index.php');
} catch (PDOException $e) {
    header('Location:error.php?error='.$e->getCode());
}

