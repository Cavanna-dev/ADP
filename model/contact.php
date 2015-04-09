<?php

include_once '../functions/connection_db.php';
include '../model/bootstrap.php';

$idUser     =   $_POST['inputId'];
$subject    =   substr(htmlspecialchars($_POST['inputSubject'], ENT_QUOTES),0,95);
$message    =   htmlspecialchars($_POST['textMessage'], ENT_QUOTES);
$name       =   htmlspecialchars($_POST['inputName'], ENT_QUOTES);
$firstName  =   htmlspecialchars($_POST['inputFirstName'], ENT_QUOTES);
$email      =   htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);

if(empty($name)){
    header('Location:../index.php'); die;
}


try{
    $sql = "INSERT INTO contact "
        . "(idUser, subject, name, firstName, email) "
        . "VALUES "
        . "(:idUser,:subject,:name,:firstName,:email) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idUser", $idUser);
    $stmt->bindParam(":subject", $subject, PDO::PARAM_STR, 100);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 60);
    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR, 100);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR, 150);
    $stmt->execute();

    $sql = "SELECT (SELECT value FROM config WHERE label = 'emailContact') emailContact, ";
    $sql .= "(SELECT value FROM config WHERE label = 'nameFo') nameFo ";
    $resultat = $db->query($sql);
    $resultat->execute();
    $reqConfig = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    
    
    $body = $firstName.' '.$name.'<br/>';
    $body .= $email.'<br/><br/><br/>';
    $body .= $message;
    
    sendMailTo($firstName.' '.$name, $email, $reqConfig['nameFo'], $reqConfig['emailContact'], $subject, $body);  
    
    header('Location:../contact.php?success');
  
} catch (PDOException $e) {
    
    die;
  header('Location:../contact.php?error');
}
?>