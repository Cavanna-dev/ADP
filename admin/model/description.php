<?php
if(empty($_GET['key'])){
    header('Location:index.php');die;
}

$key=$_GET['key'];



$sql = "SELECT D1.id, CONCAT (valueA, ' ', valueB) AS description, "
    . "CONCAT (C1.firstName, ', ', C1.name) AS user, "
    . "D1.isActive, D1.idArticle, D1.dateCreate, "
    . "A1.name, A1.reference, A1.brand, CA1.name AS category "
    . "FROM description AS D1, customers AS C1, articles AS A1 "
    . "LEFT JOIN categories AS CA1 ON CA1.id = A1.idCategory "
    . "WHERE D1.id = '".$key."' "
    . "AND C1.id = D1.idUser "
    . "AND D1.idArticle = A1.id ";
$resultat = $db->query($sql);
$resultat->execute();
$reqDescription = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();
