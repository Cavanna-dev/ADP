<?php

session_start();
$id_product_to_del = $_GET['id'];

foreach ($_SESSION['panier']['article'] as $key => $article):
    if ($article == $id_product_to_del):
        unset($_SESSION['panier']['article'][$key]);
        $_SESSION['panier']['total']--;
        if ($_SESSION['panier']['total'] == 0){
            unset($_SESSION['panier']['total']);
            unset($_SESSION['panier']['article']);
        }
    endif;
endforeach;

header('Location:' . $_SERVER['HTTP_REFERER']);

?>