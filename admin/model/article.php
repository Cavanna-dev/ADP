<?php
$valueIsActive[0] = 'En attente';
$valueIsActive[1] = 'Oui';
$valueIsActive[2] = 'Non';


$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.idCategory, "
    . "A1.picture, A1.isActive, C1.name AS category, "
    . "(SELECT CONCAT (valueA, ' ', valueB) FROM description AS D1 WHERE D1.id = A1.idDescription) AS description, "
    . "(SELECT COUNT(id) FROM description AS D1 WHERE D1.idArticle = A1.Id) AS nbDescription, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 0) AS nbSalesIn, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 1) AS nbSalesOut, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 2) AS nbCancel "
    . "FROM articles AS A1 LEFT JOIN categories AS C1 ON C1.id = A1.idCategory "
    . "WHERE A1.id = ".$_GET['key'];

$resultat = $db->query($sql);
$resultat->execute();
$reqArticle = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();
