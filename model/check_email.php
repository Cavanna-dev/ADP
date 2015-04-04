<?php

if(empty($_POST['inputEmail']) || empty($_POST['inputName']))
    header('Location:../index.php');


include_once '../functions/connection_db.php';
include '../model/bootstrap.php';

$email  =   htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);
$name   =   htmlspecialchars($_POST['inputName'], ENT_QUOTES);

$sql = "SELECT * FROM customer WHERE email = '" . $email . "' AND name = '" . $name . "' AND isActive = 1";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();


if(!empty($req)){
    
    
    $sql = "UPDATE customer SET passChange=1, dateChange=now() "
    . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $req['id'], PDO::PARAM_INT, 1);
    $stmt->execute();
    
    
    $sql = "SELECT (SELECT value FROM config WHERE label = 'emailSend') emailSend, ";
    $sql .= "(SELECT value FROM config WHERE label = 'nameFo') nameFo ";
    $resultat = $db->query($sql);
    $resultat->execute();
    $reqConfig = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    
    $serverName = explode('forgetPassword', $_SERVER['HTTP_REFERER']);
    
    $keyBdd = md5(md5($req['name']).md5($req['email']).md5($req['name']));
    
    $subject = 'Réinitialisation du mot de passe';
    $body = 'Chers '.$req['firstName'].$req['name'].'<br/><br/>';
    $body .= 'Vous avez demandé la réinitialisation de votre mot de passe.<br/>';
    $body .= 'Vous trouvez ci-dessous un lien pour initialiser celui-ci.<br/><br/>';    
    $body .= $serverName[0].'newPassword.php?mail='.$req['email'].'&key='.$keyBdd;
    
    sendMailTo($reqConfig['nameFo'], $reqConfig['emailSend'], 
            ($req['firstName'].' '.$req['name']), $req['email'], $subject, $body);
    

    header('Location:../forgetPassword.php?success');
    
}else{
    header('Location:../forgetPassword.php?error');
}



?>
