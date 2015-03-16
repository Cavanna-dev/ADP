<?php

if(empty($_POST['idArticle'])){
    header('Location:../index.php');
}

include_once '../functions/connection_db.php';

$idArticle      =   $_POST['idArticle'];
$idUser         =   $_POST['idUser'];
$description    =   htmlspecialchars($_POST['description'], ENT_QUOTES);


try{
    if(strlen($description) > 255):
        $valueA = substr($description, 0, 255);
        $valueB = substr($description, 255, 255);
    else: 
        $valueA = $description;
        $valueB = '';
    endif;
        
    $sql = "INSERT INTO description "
        . "(idUser, idArticle, valueA, valueB) "
        . "VALUES "
        . "(:idUser, :idArticle, :valueA, :valueB) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT, 11);
    $stmt->bindParam(":idArticle", $idArticle, PDO::PARAM_INT, 11);
    $stmt->bindParam(":valueA", $valueA, PDO::PARAM_STR, 255);
    $stmt->bindParam(":valueB", $valueB, PDO::PARAM_STR, 255);
    $stmt->execute();

    header('Location:../article.php?key='.$idArticle.'&descriptionSucces');
    
} catch (PDOException $e) {
    header('Location:../article.php?key='.$idArticle);
}
?>
