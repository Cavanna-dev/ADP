<?php

include_once '../functions/connection_db.php';

if(empty($_GET['key']))
    header('Location:listContact.php');

$key = $_GET['key'];

$sql = "SELECT C1.id, C1.idUser, C1.status, C1.subject, C1.dateCreate, C1.dateChange, "
    . "CU1.name AS nameCustomer, CU1.firstName AS firstNameCustomer,  "
    . "CONCAT (U1.firstName, ' ', U1.name) AS nameUser  "        
    . "FROM customer AS CU1, contact AS C1 LEFT JOIN user AS U1 ON U1.id = C1.idAdminUser  "
    . "WHERE CU1.id = C1.idUser  "
    . "AND C1.id = '".$key."' "
    . "ORDER BY C1.dateChange DESC ";
$resultat = $db->query($sql);
$resultat->execute();
$reqContact = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();


$valueStatus[0] = 'A traiter';
$valueStatus[1] = 'En cours';
$valueStatus[2] = 'Terminé';