<?php
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';



@$name      = htmlspecialchars($_GET['inputName'], ENT_QUOTES);
@$isActive  = $_GET['selectIsActive'];
@$id        = $_GET['id'];


$where='';
if(!empty($id)){ $where .= "AND id = '.$id.' "; }
if(!empty($name)){ $where .= "AND ("
        . "name LIKE '%".$name."%' "
        . "OR firstName LIKE '%".$name."%'"
        . ")"; }
if(!empty($isActive)){ $where .= "AND C1.isActive = '".$valueIsActive[$isActive]."' "; }


$sql = "SELECT id, name, firstName, email, town, dateCreate, dateBirth, isActive, "
    . "(SELECT COUNT(id) FROM articles WHERE isActive<>0 AND idUser = customers.id) AS articleCreate, "
    . "(SELECT COUNT(id) FROM description WHERE isActive=1 AND idUser = customers.id) AS descriptionCreate, "
    . "(SELECT COUNT(id) FROM availability WHERE isActive=1 AND idUserSales = customers.id AND status=1) AS articleSales, "
    . "(SELECT COUNT(id) FROM articles WHERE isActive<>0 AND idUser = customers.id) AS articleBuy " // A CHANGER
    . "FROM customers "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY DateChange DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqListCustomer = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();
