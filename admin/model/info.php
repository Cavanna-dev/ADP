<?php

include_once '../functions/connection_db.php';

if(!empty($_GET['key']) && $_SESSION['user_role']>0 && $_GET['key'] != $_SESSION['user_id']):
    $key=$_GET['key']; $selectMenu = 4;
else:
    $key=$_SESSION['user_id']; $selectMenu = 5;
endif;



$sql = "SELECT email, name, firstName, dateCreate, role "
    . "FROM user "
    . "WHERE id = ".$key;

$resultat = $db->query($sql);
$resultat->execute();
$reqUser = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();

