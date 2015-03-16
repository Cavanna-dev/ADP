<?php

if(empty($_POST['idDescription']) || $_POST['idDescription']==NULL){
    header('Location:../listArticle.php'); die;
}

include_once '../../functions/connection_db.php';

$key      =   $_POST['idDescription'];
$description    =   htmlspecialchars($_POST['description'], ENT_QUOTES);

try {
     if(strlen($description) > 255):
        $valueA = substr($description, 0, 255);
        $valueB = substr($description, 255, 255);
    else: 
        $valueA = $description;
        $valueB = '';
    endif;    
    
    $sql = "UPDATE description SET "
        . "valueA=:valueA, valueB=:valueB, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":valueA", $valueA, PDO::PARAM_STR, 255);
    $stmt->bindParam(":valueB", $valueB, PDO::PARAM_STR, 255);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 11);
    $stmt->execute();
    header('Location:../article.php?key='.$key.'&descriptionSucces');
} catch (PDOException $e) {
    header('Location:../article.php?key='.$key.'&erreur');
}