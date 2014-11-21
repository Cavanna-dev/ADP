<?php

include_once '../functions/connection_db.php';

$id = htmlspecialchars($_GET['id']);

try {
    $resultats = $db->query("SELECT id, source "
            . "FROM `carousel` "
            . "WHERE id='" . $id . "'", PDO::FETCH_OBJ);

    foreach ($resultats as $resultat) {
        unlink('../img/uploads_carousel/' . $resultat->source);
    }
    
    try {
        $db->exec("DELETE FROM `carousel`"
                . "WHERE id='" . $id . "'");

        header('Location:homePageCarousel.php');
    } catch (PDOException $e) {
        header('Location:homePageCarousel.php');
    }
    
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}
?>