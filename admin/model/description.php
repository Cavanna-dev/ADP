<?php
if(empty($_GET['key'])){
    header('Location:index.php');die;
}

$key=$_GET['key'];


$sql = "SELECT D1.id, CONCAT (valueA, ' ', valueB) AS description, "
    . "CONCAT (firstName, ', ', name) AS user, "
    . "D1.isActive, D1.idArticle, D1.dateCreate "
    . "FROM description AS D1, customers AS C1 "
    . "WHERE D1.id = '".$key."' "
    . "AND C1.id = idUser ";
$resultat = $db->query($sql);
$resultat->execute();
$reqDescription = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();
