<?php
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';



@$name      = htmlspecialchars($_GET['inputName'], ENT_QUOTES);
@$isActive  = $_GET['selectIsActive'];
@$id        = $_GET['id'];


$where='';
if(!empty($id)){ $where .= "AND id = ".$id." "; }
if(!empty($name)){ $where .= "AND ("
        . "name LIKE '%".$name."%' "
        . "OR firstName LIKE '%".$name."%'"
        . ")"; }
if(isset($isActive) && ($isActive=='0' || $isActive=='1')){ $where .= "AND isActive = '".$isActive."' "; }


$sql = "SELECT id, name, firstName, email, town, dateCreate, dateBirth, isActive, "
    . "(SELECT COUNT(id) FROM article WHERE isActive<>0 AND idUser = C1.id) AS articleCreate, "
    . "(SELECT COUNT(id) FROM description WHERE isActive=1 AND idUser = C1.id) AS descriptionCreate, "
    . "(SELECT COUNT(id) FROM availability WHERE isActive=1 AND idUserSales = C1.id AND status=2) AS articleSales, "
    . "(SELECT SUM(nbProduct) FROM command WHERE idUserBuy = C1.id) AS articleBuy "
    . "FROM customer AS C1 "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY DateChange DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqListCustomer = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();
