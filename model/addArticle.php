<?php

include_once '../functions/connection_db.php';

$idUser     =   $_POST['idUser'];
$brand      =   htmlspecialchars($_POST['inputBrand'], ENT_QUOTES);
$reference  =   htmlspecialchars($_POST['inputReference'], ENT_QUOTES);
$name       =   htmlspecialchars($_POST['inputName'], ENT_QUOTES);
$tags       =   htmlspecialchars($_POST['inputTags'], ENT_QUOTES);
$idCategory =   $_POST['idCategory'];
$picture    =   htmlspecialchars($_FILES['inputImg']['name'], ENT_QUOTES);

if(empty($brand) || empty($reference) || empty($name) || 
        empty($tags) || empty($idCategory) ||  empty($picture)){
    header('Location:../addArticle.php?erreur'
            . '&brand='.$brand
            . '&reference='.$reference
            . '&name='.$name
            . '&category='.$idCategory
            . '&tags='.$tags); die;
}

try{
    $sql = "INSERT INTO article "
        . "(idCategory, idUser, idDescription, reference, name, brand, tags, picture) "
        . "VALUES "
        . "(:idCategory,:idUser,null,:reference,:name,:brand,:tags,:picture) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idCategory", $idCategory, PDO::PARAM_INT, 11);
    $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT, 11);
    $stmt->bindParam(":reference", $reference, PDO::PARAM_STR, 50);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 100);
    $stmt->bindParam(":brand", $brand, PDO::PARAM_STR, 50);
    $stmt->bindParam(":tags", $tags, PDO::PARAM_STR, 255);
    $stmt->bindParam(":picture", $picture, PDO::PARAM_STR, 255);
    $stmt->execute();
    $idArticle = $db->lastInsertId();

    mkdir('../img/articles/'.$idArticle);
    $uploaddir = '../img/articles/'.$idArticle.'/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);


  header('Location:../addArticle.php?article='.$idArticle);
  
} catch (PDOException $e) {
  header('Location:../addArticle.php?erreur'
            . '&brand='.$brand
            . '&reference='.$reference
            . '&name='.$name
            . '&category='.$idCategory
            . '&tags='.$tags);
}
?>