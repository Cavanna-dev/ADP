<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 12/03/15
 * Time: 21:13
 */


include_once '../../functions/connection_db.php';

if(empty($_POST['idCategory'])){
    header('Location:../addCategory.php');die;
}


try {
    $sql = "UPDATE categories SET isActive=:isActive, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":isActive", $_POST['valueIsActive'], PDO::PARAM_INT, 1);
    $stmt->bindParam(":id", $_POST['idCategory'], PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../addCategory.php?categoryUpdate');
} catch (PDOException $e) {
    header('Location:../addCategory.php?erreur');
}