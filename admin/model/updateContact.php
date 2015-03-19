<?php
include_once '../../functions/connection_db.php';

if(empty($_POST['idAdminUser'])){
    header('Location:../listContact.php');die;
}

$key = $_POST['id'];

try {
    $sql = "UPDATE contact SET status=:status, idAdminUser=:idAdminUser, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":status", $_POST['status'], PDO::PARAM_INT, 11);
    $stmt->bindParam(":idAdminUser", $_POST['idAdminUser'], PDO::PARAM_INT, 11);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 11);
    $stmt->execute();
    header('Location:../contact.php?key='.$key.'&success');
} catch (PDOException $e) {
    header('Location:../contact.php?key='.$key.'&error');
}

