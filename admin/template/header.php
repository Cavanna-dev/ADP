<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
if(!isset($_SESSION['user_logged']) && strpos($_SERVER['PHP_SELF'], 'index.php')===FALSE){ header('location:index.php'); }

include_once '../functions/connection_db.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/bootswatch.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>