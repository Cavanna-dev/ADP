<?php

include_once '../functions/connection_db.php';

$content = htmlspecialchars($_POST['inputContent']);
$img     = htmlspecialchars($_POST['inputImg']);

try{
    $resultats = $db->exec("INSERT INTO `carousel`"
            . "(`id`, `source`, `content`) "
            . "VALUES (null,'".$img."','".$content."')");
    
    header('Location:homePageCarousel.php');
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}

?>