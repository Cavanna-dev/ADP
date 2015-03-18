<?php
$valueIsActive[2] = 'En attente';
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';

if(empty($_GET['key'])){
    header('Location:listArticle.php');die;
}

$key=$_GET['key'];

$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.idCategory, "
    . "A1.picture, A1.isActive, C1.name AS category, "
    . "(SELECT CONCAT (valueA, ' ', valueB) FROM description AS D1 WHERE D1.id = A1.idDescription) AS description, "
    . "(SELECT COUNT(id) FROM description AS D1 WHERE D1.idArticle = A1.Id AND D1.isActive=1) AS nbDescription, "
    . "(SELECT COUNT(id) FROM description AS D1 WHERE D1.idArticle = A1.Id AND D1.isActive=0) AS nbDescriptionInactive, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 0) AS nbSalesIn, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 1) AS nbSalesOut, "
    . "(SELECT COUNT(id) FROM availability AS AV1 WHERE A1.id = idArticle AND AV1.isActive=1 AND Status = 2) AS nbCancel "
    . "FROM articles AS A1 LEFT JOIN categories AS C1 ON C1.id = A1.idCategory "
    . "WHERE A1.id = ".$key;

$resultat = $db->query($sql);
$resultat->execute();
$reqArticle = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();

