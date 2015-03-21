<?php

$valueIsActive[0] = 'En attente';
$valueIsActive[1] = 'Oui';
$valueIsActive[2] = 'Non';


$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.tags, "
    . "A1.picture, A1.isActive, C1.name AS category,"
    . "(SELECT CONCAT (valueA, ' ', valueB) FROM description AS D1 "
    . "WHERE D1.id = A1.idDescription) AS description "
    . "FROM article AS A1 LEFT JOIN category AS C1 ON C1.id = A1.idCategory "
    . "WHERE A1.id = ".$_GET['key'];
    
$resultat = $db->query($sql);
$resultat->execute();
$reqArticle = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();


if($reqArticle['isActive']==0 || !isset($reqArticle['id']))
    header('Location:index.php');