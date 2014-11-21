<?php

include_once '../functions/connection_db.php';

$compteur = 1; //Compter le nombre de résultat pour le tableau de la vue

try{
    $resultats = $db->query("SELECT * "
            . "FROM carousel ", PDO::FETCH_OBJ);
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>