<?php
include_once '../../functions/config.php';

function hashagePass($password) {
    return md5(CONST_SALT_PRE . md5($password) . CONST_SALT_SUF);
}


include_once '../../functions/connection_db.php';

if(empty($_POST['inputUpdatePassword'])){
    header('Location:../info.php?key='.$_POST['key']);die;
}

$password   =   hashagePass(htmlspecialchars($_POST['inputUpdatePassword']));

try {
    $sql = "UPDATE user SET password=:password, dateChange=now() "
        . "WHERE id=:id ";
    $stmt = $db->prepare($sql);
   $stmt->bindParam(":password", $password, PDO::PARAM_STR, 255);
    $stmt->bindParam(":id", $_POST['key'], PDO::PARAM_INT, 1);
    $stmt->execute();
    
    header('Location:../info.php?success&key='.$_POST['key']);
} catch (PDOException $e) {
    header('Location:../info.php?error&key='.$_POST['key']);
}