<?php

include_once '../../functions/connection_db.php';


if(empty($_POST['label']) || empty($_POST[$_POST['label']])){
    header('Location:../index.php');die;
}

try {
    $sql = "UPDATE config_css SET isActive=0 "
        . "WHERE label=:label ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":label", $_POST['label'], PDO::PARAM_STR, 40);
    $stmt->execute();
    
    
    $sql = "UPDATE config_css SET isActive=1, dateChange=now() "
        . "WHERE label=:label AND value=:value ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":value", $_POST[$_POST['label']], PDO::PARAM_STR, 40);
    $stmt->bindParam(":label", $_POST['label'], PDO::PARAM_STR, 40);
    $stmt->execute();

    header('Location:../interface.php?page='.$_POST['page'].'&success');
} catch (PDOException $e) {
    header('Location:../interfae.php?page='.$_POST['page'].'erreur');
}

