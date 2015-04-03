<?php
session_start();
$_SESSION['panier'] = Array();
header('Location:'.$_SERVER['HTTP_REFERER']);
?>