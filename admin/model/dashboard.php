<?php
include_once '../functions/connection_db.php';

$sql = "SELECT "
    . "(SELECT COUNT(id) FROM articles) AS articleTotal, "
    . "(SELECT COUNT(id) FROM articles WHERE isActive = 1) AS articleActif, "
    . "(SELECT COUNT(id) FROM articles WHERE isActive = 2) AS articleEnAttente, "
    . "(SELECT COUNT(id) FROM articles WHERE isActive = 0) AS articleInactif, "
        
    . "(SELECT COUNT(id) FROM articles WHERE isActive <> 0 "
        . "AND idDescription IS NOT NULL) AS articleDescription, "
    . "(SELECT COUNT(id) FROM articles AS A1 WHERE isActive <> 0 "
        . "AND idDescription IS NULL "
        . "AND (SELECT COUNT(D1.id) FROM description AS D1 WHERE D1.idArticle = A1.Id AND D1.isActive=1) > 0"
        . ") AS articleDescriptionDispo, "
    . "(SELECT COUNT(id) FROM articles AS A1 WHERE isActive <> 0 "
        . "AND idDescription IS NULL "
        . "AND (SELECT COUNT(id) FROM description AS D1 WHERE D1.idArticle = A1.Id AND D1.isActive=1) = 0"
        . ") AS articleDescriptionNoDispo, "
        
    . "(SELECT COUNT(id) FROM customers) AS customerTotal, "
    . "(SELECT COUNT(id) FROM customers WHERE isActive = 1) AS customerActif, "
    . "(SELECT COUNT(id) FROM customers WHERE isActive = 0) AS customerInactif "
        
    . "";

$resultat = $db->query($sql);
$resultat->execute();
$reqDashboard = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();
