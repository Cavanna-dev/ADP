<?php
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';

if(empty($_GET['key'])){
    header('Location:listArticle.php');die;
}

$key=$_GET['key'];
@$isActive = $_GET['selectIsActive'];


$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, C1.name AS category "
    . "FROM articles AS A1 LEFT JOIN categories AS C1 ON C1.id = A1.idCategory "
    . "WHERE A1.id = ".$key;

$resultat = $db->query($sql);
$resultat->execute();
$reqArticle = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();

if($reqArticle['idDescription'] != NULL){
    header('Location:article.php?key='.$key);die;
}



$where='';
if(!empty($isActive) || $isActive=='0'){ $where .= "AND D1.isActive = ".$isActive." "; }

$sql = "SELECT D1.id, CONCAT (valueA, ' ', valueB) AS description, CONCAT (firstName, ', ', name) AS user, "
    . "D1.isActive, D1.dateCreate "
    . "FROM description AS D1, customers AS C1 "
    . "WHERE idArticle = '".$key."' "
    . "AND C1.id = idUser "
    . $where
    . "ORDER BY D1.DateChange DESC ";

$resultat = $db->query($sql);
$resultat->execute();
$reqListDescription = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

