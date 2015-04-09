<?php

session_start();
include_once 'functions/connection_db.php';

$new_product_basket = $_GET['id'];

if (!isset($_SESSION['panier']))
    $_SESSION['panier'] = Array();

if (in_array($new_product_basket, $_SESSION['panier']['article'])):
    header('Location:article.php?key='.$new_product_basket.'&erreur=1');
die;
endif;

if (!isset($_SESSION['panier']['total'])) {
    $_SESSION['panier']['total'] = 1;
} else {
    $_SESSION['panier']['total'] ++;
}
$_SESSION['panier']['article'][] = $_GET['id'];

header('Location:' . $_SERVER['HTTP_REFERER']);
?>
