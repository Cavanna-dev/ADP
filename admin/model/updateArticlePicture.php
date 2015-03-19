<?php

include_once '../../functions/connection_db.php';

$key        =   $_POST['key'];
$keyDel     =   $_POST['keyDel'];
$picture    =   htmlspecialchars($_FILES['inputImg']['name']);


if(empty($key)){
    header('Location:../listArticle.php'); die;
}

if(empty($picture)){
    header('Location:../article.php?key='.$key);die;
}


try {
    $sql = "UPDATE article SET picture=:picture, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 1);
    $stmt->bindParam(":picture", $picture, PDO::PARAM_STR, 255);
    $stmt->execute();


    unlink('../../img/articles/'.$key.'/'.$keyDel);    
    
    @mkdir('../../img/articles/'.$key.'/');
    $uploaddir = '../../img/articles/'.$key.'/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);
    
    header('Location:../article.php?key='.$key);
} catch (PDOException $e) {

    header('Location:../article.php?key='.$key.'&erreur');

}