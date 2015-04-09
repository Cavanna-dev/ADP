<?php

include_once '../../functions/connection_db.php';

if(empty($_POST['name'])){
    header('Location:../category.php?erreur');die;
}

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$idParent = htmlspecialchars($_POST['idParent'], ENT_QUOTES);
$idAdminUser = htmlspecialchars($_POST['idAdminUser'], ENT_QUOTES);


try {
    $sql = "INSERT INTO category"
        . "(idParent, idAdminUser, name) "
        . "VALUES "
        . "(:idParent,:idAdminUser,:name)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idParent", $idParent, PDO::PARAM_INT, 1);
    $stmt->bindParam(":idAdminUser", $idAdminUser, PDO::PARAM_INT, 1);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 50);
    $stmt->execute();

    header('Location:../category.php?category&page='.$_POST['page']);
} catch (PDOException $e) {
    header('Location:../category.php?erreur&page='.$_POST['page']);
}
?>