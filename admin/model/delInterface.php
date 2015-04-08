<?php

include_once '../../functions/connection_db.php';
include_once('../../functions/func.php');


if(empty($_POST['label'])){
    header('Location:../index.php');die;
}

try {
    $last  =   paramConfig($_POST['label'], $db);
    unlink('../../img/'.$_POST['label'].'/'.$last);
    
    $sql = "UPDATE config SET value=NULL, dateChange=now() "
        . "WHERE label=:label ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":label", $_POST['label'], PDO::PARAM_STR, 100);
    $stmt->execute();
    
    header('Location:../interface.php?page='.$_POST['page'].'&success');
} catch (PDOException $e) {
    header('Location:../interfae.php?page='.$_POST['page'].'erreur');
}

