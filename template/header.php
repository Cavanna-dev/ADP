<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
include_once 'functions/config.php';

include_once 'functions/connection_db.php';
include_once('functions/func.php');

$css = paramConfigCss('templateFo', $db);
$favicon = paramConfig('imgFavFo', $db);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/<?=$css?>.min.css">
        <link rel="stylesheet" href="./css/main.css">
        <link rel="icon" type="image/png" href="img/imgFavFo/<?=$favicon?>" />
        
        <script src="./js/jquery-1.11.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>
    <body>