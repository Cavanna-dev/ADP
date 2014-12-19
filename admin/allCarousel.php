<?php

include_once '../functions/connection_db.php';

$compteur = 1; //Compter le nombre de résultat pour le tableau de la vue

try{
    $sql = "SELECT id, source, content "
         . "FROM carousel";
    
    $resultat = $db->prepare($sql);
    $resultat->query();
    
    
    
    
    
    
    $resultats = $db->query("SELECT * "
            . "FROM carousel ", PDO::FETCH_OBJ);
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>