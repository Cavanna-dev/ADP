<?php

include_once '../functions/connection_db.php';

$idCategory =   $_POST['idCategory'];
$idUser     =   $_POST['idUser'];
$reference  =   htmlspecialchars($_POST['reference'], ENT_QUOTES);
$name       =   htmlspecialchars($_POST['name'], ENT_QUOTES);
$brand      =   htmlspecialchars($_POST['brand'], ENT_QUOTES);
$picture    =   htmlspecialchars($_FILES['inputImg']['name'], ENT_QUOTES);

if(empty($idCategory) || empty($idUser) || empty($reference) || empty($reference) || empty($brand) ||  empty($picture)){
    header('Location:../addArticle.php?erreur&category='.$idCategory.'&reference='.$reference.'&name='.$name.'&brand='.$brand);
}

try{
    $sql = "INSERT INTO articles "
        . "(idCategory, idUser, idDescription, reference, name, brand, picture) "
        . "VALUES "
        . "(:idCategory,:idUser,null,:reference,:name,:brand,:picture) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idCategory", $idCategory, PDO::PARAM_INT, 11);
    $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT, 11);
    $stmt->bindParam(":reference", $reference, PDO::PARAM_STR, 50);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 100);
    $stmt->bindParam(":brand", $brand, PDO::PARAM_STR, 50);
    $stmt->bindParam(":picture", $picture, PDO::PARAM_STR, 255);
    $stmt->execute();
    $idArticle = $db->lastInsertId();

    mkdir('../img/articles/'.$idArticle);
    $uploaddir = '../img/articles/'.$idArticle.'/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);



  header('Location:../addArticle.php?article='.$idArticle);
} catch (PDOException $e) {
  header('Location:../addArticle.php?erreur&category='.$idCategory.'&reference='.$reference.'&name='.$name.'&brand='.$brand);
}
?>