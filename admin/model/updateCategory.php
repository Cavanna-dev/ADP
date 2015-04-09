<?php

include_once '../../functions/connection_db.php';
if(empty($_POST['idCategory'])){
    header('Location:../category.php');die;
}
try {
    $sql = "UPDATE category SET isActive=:isActive, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":isActive", $_POST['valueIsActive'], PDO::PARAM_INT, 1);
    $stmt->bindParam(":id", $_POST['idCategory'], PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../category.php?categoryUpdate&page='.$_POST['page']);
} catch (PDOException $e) {
    header('Location:../category.php?erreur&page='.$_POST['page']);
}