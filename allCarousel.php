<?php

include_once './functions/connection_db.php';

/**
 * Try/Catch
 * On récupère les images Carousel de la base de donnée
 * qui ont la propriété 'Page Accueil' activée
 */
try{
    $sql = "SELECT id, source, content, isHp "
         . "FROM carousel "
         . "WHERE isHp=1";    
    $resultats = $db->prepare($sql);
    $resultats->execute();

    
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>