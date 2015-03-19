<?php

if(empty($_POST['idArticle'])){
    header('Location:../listArticle.php'); die;
}

include_once '../../functions/connection_db.php';

$key = $_POST['idArticle'];
$idDescription = $_POST['idDescription'];

try {
    $sql = "UPDATE article SET "
        . "idDescription=:idDescription, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idDescription", $idDescription, PDO::PARAM_INT, 1);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 1);
    $stmt->execute();
    header('Location:../article.php?key='.$key.'&descriptionSucces');
} catch (PDOException $e) {
    header('Location:../article.php?key='.$key.'&erreur');
}


