<?php

include_once './functions/hashagePass.php';
include_once './functions/connection_db.php';

$email      = htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);
$password   = $_POST['inputPassword'];
$name       = htmlspecialchars($_POST['inputName'], ENT_QUOTES);
$firstName  = htmlspecialchars($_POST['inputFirstName'], ENT_QUOTES);
$address    = htmlspecialchars($_POST['inputAddress'], ENT_QUOTES);
$town       = htmlspecialchars($_POST['inputTown'], ENT_QUOTES);
$post       = htmlspecialchars($_POST['inputPost'], ENT_QUOTES);
$dob        = htmlspecialchars($_POST['inputDateBirth'], ENT_QUOTES);


try {
    $resultats = $db->exec("INSERT INTO `customers`"
            . "(`email`, `password`, `name`, `firstName`, "
            . "`address`, `town`, `post`, `dateBirth`) "
            . "VALUES ('".$email."', "
            . "'".hashagePass(htmlspecialchars($password))."', " //Fonction functions/hashagePass.php
            . "'".$name."', '".$firstName."', "
            . "'".$address."', '".$town."', "
            . "'".$post."', '".$dob."'"
            . ")");
    
    header('Location:form_login.php?succes'
            . '&inputEmailLog='.$email);
} catch (PDOException $e) {
    header('Location:form_login.php?error'
            . '&inputEmail='.$_POST['inputEmail']
            . '&inputName='.$_POST['inputName']
            . '&inputFirstName='.$_POST['inputFirstName']
            . '&inputAddress='.$_POST['inputAddress']
            . '&inputTown='.$_POST['inputTown']
            . '&inputPost='.$_POST['inputPost']
            . '&inputDateBirth='.$_POST['inputDateBirth']);
}

