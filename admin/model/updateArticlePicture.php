<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 14/03/15
 * Time: 21:15
 */

include_once '../../functions/connection_db.php';

$key        =   htmlspecialchars($_POST['key']);
$picture    =   htmlspecialchars($_FILES['inputImg']['name']);


if(empty($key)){
    header('Location:../listArticle.php'); die;
}

if(empty($picture)){
    header('Location:../article.php?key='.$key);die;
}


try {
    $sql = "UPDATE articles SET picture=:picture, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $key, PDO::PARAM_INT, 1);
    $stmt->bindParam(":picture", $picture, PDO::PARAM_STR, 255);
    $stmt->execute();


    rmdir('../../img/articles/'.$key.'/');
    mkdir('../../img/articles/'.$key.'/');
    $uploaddir = '../../img/articles/'.$key.'/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);


    header('Location:../article.php?key='.$key);
} catch (PDOException $e) {

    header('Location:../article.php?key='.$key.'&erreur');

}