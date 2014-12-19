<?php

include_once './functions/connection_db.php';


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