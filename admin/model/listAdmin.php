<?php
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';



@$name      = htmlspecialchars($_GET['inputName'], ENT_QUOTES);
@$isActive  = $_GET['selectIsActive'];
@$id        = $_GET['id'];


$where='';
if(!empty($id)){ $where .=  "AND id = ".$id." "; }
if(!empty($name)){ $where .= "AND ("
        . "name LIKE '%".$name."%' "
        . "OR firstName LIKE '%".$name."%'"
        . ")"; }
if(isset($isActive) && ($isActive=='0' || $isActive=='1')){ $where .= "AND isActive = '".$isActive."' "; }


$sql = "SELECT id, name, firstName, email, role, dateCreate, isActive "
    . "FROM user "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY Name DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqListAdmin= $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();
