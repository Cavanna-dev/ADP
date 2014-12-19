<?php

include_once '../functions/connection_db.php';

$id = htmlspecialchars($_POST['inputId']);
$content = htmlspecialchars($_POST['inputContent']);
$img = htmlspecialchars($_FILES['inputImg']['name']);

try {
    if(!empty($img)){
    $db->exec("UPDATE `carousel` "
            . "SET `source`='" . $source . "', `content`='" . $content . "' "
            . "WHERE `id`='" . $id . "'");

    $uploaddir = '../img/uploads_carousel/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);
    }else{
    $db->exec("UPDATE `carousel` "
            . "SET `content`='" . $content . "' "
            . "WHERE `id`='" . $id . "'");
    }
    header('Location:homePageCarousel.php');

} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}
?>