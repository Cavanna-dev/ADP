<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 18/02/15
 * Time: 19:05
 */

include_once '../functions/connection_db.php';

$idCategory =   htmlspecialchars($_POST['idCategory']);
$idUser     =   htmlspecialchars($_POST['idUser']);
$reference  =   htmlspecialchars($_POST['reference']);
$name       =   htmlspecialchars($_POST['name']);
$brand      =   htmlspecialchars($_POST['brand']);
$picture    =   htmlspecialchars($_FILES['inputImg']['name']);

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