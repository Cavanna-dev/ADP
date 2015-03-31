<?php

include_once '../../functions/config.php';

function hashagePass($password) {
    return md5(CONST_SALT_PRE . md5($password) . CONST_SALT_SUF);
}


include_once '../../functions/connection_db.php';

$email      =   htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);
$password   =   hashagePass(htmlspecialchars($_POST['inputPassword'],ENT_QUOTES));
$name       =   htmlspecialchars($_POST['name'], ENT_QUOTES);
$firstName  =   htmlspecialchars($_POST['firstName'], ENT_QUOTES);

if(empty($email) || empty($password) || empty($name) || empty($firstName)){
    header('Location:../addAdmin.php?erreur&inputEmail='.$email.'&name='.$name.'&firstName='.$firstName);
}

try{
    $sql = "INSERT INTO user "
        . "(email, password, name, firstName) "
        . "VALUES "
        . "(:email,:password,:name,:firstName) ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR, 150);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR, 15);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR, 60);
    $stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR, 100);
    $stmt->execute();
    $idAdmin = $db->lastInsertId();

    header('Location:../listAdmin.php?id='.$idAdmin);
} catch (PDOException $e) {
    header('Location:../addAdmin.php?erreur&email='.$email.'&password='.$password.'&name='.$name.'&firstName='.$firstName);
}
?>
