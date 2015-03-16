<?php

include_once '../../functions/connection_db.php';


if(empty($_POST['key'])){
    header('Location:../listArticle.php'); die;
}

$key        =   htmlspecialchars($_POST['key']);
$name       =   htmlspecialchars($_POST['name']);
$reference  =   htmlspecialchars($_POST['reference']);
$brand      =   htmlspecialchars($_POST['brand']);
$idCategory =   htmlspecialchars($_POST['idCategory']);
$isActive   =   htmlspecialchars($_POST['isActive']);

if(empty($name) || empty($reference) || empty($brand) || $idCategory==''){
    header('Location:../article.php?key='.$key);die;
}


try {
    $sql = "UPDATE articles SET "
        . "name=:name, reference=:reference, brand=:brand, "
        . "idCategory=:idCategory, isActive=:isActive, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 100);
    $stmt->bindParam(":reference", $reference, PDO::PARAM_STR, 50);
    $stmt->bindParam(":brand", $brand, PDO::PARAM_STR, 50);
    $stmt->bindParam(":idCategory", $idCategory, PDO::PARAM_INT, 11);
    $stmt->bindParam(":isActive", $isActive, PDO::PARAM_INT, 1);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../article.php?key='.$key);
} catch (PDOException $e) {

    die;
    header('Location:../article.php?key='.$key.'&erreur');
}