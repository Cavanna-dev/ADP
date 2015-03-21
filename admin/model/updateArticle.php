<?php

if(empty($_POST['key'])){
    header('Location:../listArticle.php'); die;
}

include_once '../../functions/connection_db.php';

$key        =   $_POST['key'];
$name       =   htmlspecialchars($_POST['name'], ENT_QUOTES);
$reference  =   htmlspecialchars($_POST['reference'], ENT_QUOTES);
$brand      =   htmlspecialchars($_POST['brand'], ENT_QUOTES);
$tags       =   htmlspecialchars($_POST['tags'], ENT_QUOTES);
$idCategory =   $_POST['idCategory'];
$isActive   =   $_POST['isActive'];


try {
    $sql = "UPDATE article SET "
        . "name=:name, reference=:reference, brand=:brand, "
        . "idCategory=:idCategory, isActive=:isActive, tags=:tags, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 100);
    $stmt->bindParam(":reference", $reference, PDO::PARAM_STR, 50);
    $stmt->bindParam(":brand", $brand, PDO::PARAM_STR, 50);
    $stmt->bindParam(":idCategory", $idCategory, PDO::PARAM_INT, 11);
    $stmt->bindParam(":isActive", $isActive, PDO::PARAM_INT, 1);
    $stmt->bindParam(":tags", $tags, PDO::PARAM_STR, 255);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../article.php?key='.$key.'&success');
} catch (PDOException $e) {
    header('Location:../article.php?key='.$key.'&error');
}