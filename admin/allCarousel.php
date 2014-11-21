<?php

include_once '../functions/connection_db.php';

$compteur = 1;

try{
    $resultats = $db->query("SELECT * "
            . "FROM carousel ", PDO::FETCH_OBJ);
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>