<?php

include_once '../../functions/connection_db.php';

$id = htmlspecialchars($_POST['inputId']);
$content = htmlspecialchars($_POST['inputContent']);
$img = htmlspecialchars($_FILES['inputImg']['name']);
$isHp = htmlspecialchars($_POST['inputIsHp']);


try {
    if(!empty($img)){
    $sql = "UPDATE carousel "
         . "SET source=:source, content=:content, isHp=:isHp "
         . "WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":source", $img, PDO::PARAM_STR, 255);
    $stmt->bindParam(":content", $content, PDO::PARAM_STR, 100);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT, 12);
    $stmt->bindParam(":isHp", $isHp, PDO::PARAM_INT, 1);
    $stmt->execute();

    $uploaddir = '../../img/uploads_carousel/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);
    }else{
    $sql = "UPDATE carousel "
         . "SET content=:content, isHp=:isHp "
         . "WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR, 100);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT, 12);
    $stmt->bindParam(":isHp", $isHp, PDO::PARAM_INT, 1);
    $stmt->execute();
    }
    header('Location:../homePageCarousel.php');

} catch (PDOException $e) {
    header('Location:../homePageCarousel.php');
}
?>