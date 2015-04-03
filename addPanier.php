<?php

session_start();
include_once 'functions/connection_db.php';

if (!isset($_SESSION['panier']))
    $_SESSION['panier'] = array();

if (!isset($_SESSION['panier']['total'])) {
    $_SESSION['panier']['total'] = 1;
} else {
    $_SESSION['panier']['total'] ++;
}

header('Location:' . $_SERVER['HTTP_REFERER']);
?>
