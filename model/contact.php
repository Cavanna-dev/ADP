<?php

include_once '../functions/connection_db.php';

$idUser     =   $_POST['inputId'];
$subject    =   substr(htmlspecialchars($_POST['inputSubject'], ENT_QUOTES),0,95);
$message    =   htmlspecialchars($_POST['textMessage'], ENT_QUOTES);

if(empty($idUser)){
    header('Location:../index.php'); die;
}

try{
    $sql = "INSERT INTO contact "
        . "(idUser, subject) "
        . "VALUES "
        . "(:idUser,:subject) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT, 11);
    $stmt->bindParam(":subject", $subject, PDO::PARAM_STR, 100);
    $stmt->execute();

    
    
    
    
    $headers = 'From: ';
    
    
    //mail($to, $subject, $message, $headers);
    
    
    
    header('Location:../contact.php?success');
  
} catch (PDOException $e) {
  header('Location:../contact.php?error');
}
?>