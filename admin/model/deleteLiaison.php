<?php

if(empty($_GET['key'])){
    header('Location:../listArticle.php'); die;
}

include_once '../../functions/connection_db.php';

$key      =   htmlspecialchars($_GET['key'], ENT_QUOTES);

try {
    $sql = "UPDATE article SET "
        . "idDescription = NULL, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 11);
    $stmt->execute();
    header('Location:../article.php?key='.$key.'&descriptionSucces');
} catch (PDOException $e) {
    header('Location:../article.php?key='.$key.'&erreur');
}