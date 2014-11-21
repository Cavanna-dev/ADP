<?php

include_once '../functions/connection_db.php';

$id = htmlspecialchars($_GET['id']);

try{
    $resultats = $db->exec("DELETE FROM `carousel`"
            . "WHERE id='".$id."'");
    
    header('Location:homePageCarousel.php');
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>