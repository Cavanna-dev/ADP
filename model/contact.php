<?php

include_once '../functions/connection_db.php';

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

//
//    $from = "leger.au@gmail.com";
//    $to  = "leger.au@gmail.com";
//
//    $contenu = "<html> \n";
//    $contenu .= "<head> \n";
//        $contenu .= "<style>";
//        $contenu .= "body { font: 11pt Calibri, sans-serif; }\n";
//        $contenu .= "</style>\n";
//    $contenu .= "</head> \n";
//    $contenu .= "<body> \n";
//        $contenu .= $message;
//    $contenu .= "</body> \n";
//    $contenu .= "</html> \n";
//
//    $headers  = "MIME-Version: 1.0 \n";
//    $headers .= "Content-Transfer-Encoding: 8bit \n";
//    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
//    $headers .= "Cc: \n";
//    $headers .= "From: ".$from."  \n";
//
//    $verif_envoi_mail = TRUE;
//    $verif_envoi_mail = mail ($to, $subject, $contenu, $headers);
//
//if ($verif_envoi_mail == FALSE){ 
//    echo " ### Verification Envoi du Mail=".$verif_envoi_mail." - Erreur envoi mail <br> \n";
//}else{ 
//    echo " *** Mail envoy&eacute; avec succ&egrave;s de ".$from." vers ".$to." avec comme sujet : </BR> ".$subject." \n";
//}
//
//die;
    

    
    //mail($to, $subject, $message, $headers);
    
    
    
    header('Location:../contact.php?success');
  
} catch (PDOException $e) {
    
    die;
  header('Location:../contact.php?error');
}
?>