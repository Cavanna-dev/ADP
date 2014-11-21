<?php

include_once '../functions/connection_db.php';

$content = htmlspecialchars($_POST['inputContent']);
$img = htmlspecialchars($_FILES['inputImg']['name']);

try {
    $db->exec("INSERT INTO `carousel`"
            . "(`id`, `source`, `content`) "
            . "VALUES (null,'" . $img . "','" . $content . "')");

    $uploaddir = '../img/uploads_carousel/';
    $uploadfile = $uploaddir . basename($_FILES['inputImg']['name']);

    move_uploaded_file($_FILES['inputImg']['tmp_name'], $uploadfile);

    header('Location:homePageCarousel.php');
} catch (PDOException $e) {
    header('Location:homePageCarousel.php');
}
?>