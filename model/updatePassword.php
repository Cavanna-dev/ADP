<?php
include_once '../functions/config.php';

function hashagePass($password) {
    return md5(CONST_SALT_PRE . md5($password) . CONST_SALT_SUF);
}


include_once '../functions/connection_db.php';

if(empty($_POST['email'])){
    header('Location:../index.php');die;
}

$password   =   hashagePass(htmlspecialchars($_POST['inputP1']));

try {
    $sql = "UPDATE customer SET password=:password, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR, 255);
    $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_INT, 1);
    $stmt->execute();

    header('Location:../form_login.php?passChange&inputEmailLog='.$_POST['email']);
    
} catch (PDOException $e) {
    
    die;
    header('Location:./index.php?error');
}