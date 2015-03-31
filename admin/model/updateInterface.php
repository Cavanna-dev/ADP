<?php

include_once '../../functions/connection_db.php';

if(empty($_POST['label'])){
    header('Location:../index.php');die;
}
try {
    $sql = "UPDATE config SET value=:value, dateChange=now() "
        . "WHERE label=:label ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":value", $_POST['value'], PDO::PARAM_STR, 255);
    $stmt->bindParam(":label", $_POST['label'], PDO::PARAM_STR, 100);
    $stmt->execute();
    header('Location:../interface.php?success');
} catch (PDOException $e) {
    header('Location:../interfae.php?erreur');
}

