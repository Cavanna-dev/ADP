<?php
include_once '../../functions/connection_db.php';

if(empty($_POST['idUser'])){
    header('Location:../listUser.php');die;
}
try {
    $sql = "UPDATE user SET isActive=:isActive, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":isActive", $_POST['isActive'], PDO::PARAM_INT, 1);
    $stmt->bindParam(":id", $_POST['idUser'], PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../listAdmin.php');
} catch (PDOException $e) {
    header('Location:../listAdmin.php?erreur');
}

