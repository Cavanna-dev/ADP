<?php


@$myFile = htmlspecialchars($_GET['myFile'], ENT_QUOTES);
@$idAmin = htmlspecialchars($_GET['idAdmin'], ENT_QUOTES);
@$status = htmlspecialchars($_GET['selectStatus'], ENT_QUOTES);


$where='';
if(!empty($myFile)){ $where .= "AND C1.idAdminUser = '".$idAmin."' "; }
if(isset($status) && ($status=='0' || $status=='1' || $status=='2')){ $where .= "AND C1.status = '".$status."' "; }


$sql = "SELECT C1.id, C1.idUser, C1.status, C1.subject, C1.dateCreate, C1.dateChange, "
    . "CU1.name AS nameCustomer, CU1.firstName AS firstNameCustomer,  "
    . "CONCAT (U1.firstName, ' ', U1.name) AS nameUser  "        
    . "FROM customer AS CU1, contact AS C1 LEFT JOIN user AS U1 ON U1.id = C1.idAdminUser  "
    . "WHERE CU1.id = C1.idUser  "
    . $where
    . "ORDER BY C1.dateChange DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqListContact = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

