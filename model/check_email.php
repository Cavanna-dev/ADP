<?php

if(empty($_POST['inputEmail']) || empty($_POST['inputName']))
    header('Location:../index.php');


include_once '../functions/connection_db.php';
include '../model/bootstrap.php';

$email  =   htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);
$name   =   htmlspecialchars($_POST['inputName'], ENT_QUOTES);

$sql = "SELECT * FROM customer WHERE email = '" . $email . "' AND name = '" . $name . "'";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();


if(!empty($req)){
    
    $sql = "SELECT (SELECT value FROM config WHERE label = 'emailContact') emailContact, ";
    $sql .= "(SELECT value FROM config WHERE label = 'nameFo') nameFo, ";
    $resultat = $db->query($sql);
    $resultat->execute();
    $reqConfig = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    
    $subject = 'Réinitialisation du mot de passe';
    $body = 'coucou';
    
    sendMailTo($reqConfig['nameFo'], $reqConfig['emailContact'], 
            $req['firstName'].$req['name'], $req['email'], $subject, $body);
    
    header('Location:../forgetPassword.php?success');
    
}else{
    header('Location:../forgetPassword.php?error');
}



?>
