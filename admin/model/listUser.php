<?php
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';



@$name      = htmlspecialchars($_GET['inputName'], ENT_QUOTES);
@$isActive  = $_GET['selectIsActive'];
@$id        = $_GET['id'];


$where='';
if(!empty($id)){ $where .= "AND C1.id = '.$id.' "; }
if(!empty($name)){ $where .= "AND ("
        . "C1.name LIKE '%".$name."%' "
        . "OR C1.firstName LIKE '%".$name."%'"
        . ")"; }
if(!empty($isActive)){ $where .= "AND C1.isActive = '".$valueIsActive[$isActive]."' "; }


$sql = "SELECT C1.id, C1.name, C1.fisrtName, C1.DateCreate, "
    . "FROM customers AS C1 "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY C1.DateChange DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqListCustomer = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();
