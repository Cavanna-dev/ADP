<?php
if(session_status() == PHP_SESSION_NONE){session_start();}
if(!isset($_SESSION['user_logged']) && $_SERVER['PHP_SELF'] != '/ttls/admin/index.php'){ header('location:index.php'); }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="http://bootswatch.com/spacelab/bootstrap.min.css">
    </head>
    <body>