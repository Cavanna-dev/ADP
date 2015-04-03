<?php

include_once '../../functions/connection_db.php';
include_once('../../functions/func.php');


if(empty($_POST['label'])){
    header('Location:../index.php');die;
}


if($_POST['label'] == 'imgBo' || $_POST['label'] == 'imgFo'
            || $_POST['label'] == 'imgFavBo' || $_POST['label'] == 'imgFavFo'){
    $value    =   htmlspecialchars($_FILES[$_POST['label']]['name']);
}else{
    $value    =   $_POST[$_POST['label']];
}


try {
    $sql = "UPDATE config SET value=:value, dateChange=now() "
        . "WHERE label=:label ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":value", $value, PDO::PARAM_STR, 255);
    $stmt->bindParam(":label", $_POST['label'], PDO::PARAM_STR, 100);
    $stmt->execute();
    
    
    if($_POST['label'] == 'imgBo' || $_POST['label'] == 'imgFo'
            || $_POST['label'] == 'imgFavBo' || $_POST['label'] == 'imgFavFo'):

    
        @unlink('../../img/'.$_POST['label'].'/'.paramConfig($_POST['label'], $db));    
  
        @mkdir('../../img/'.$_POST['label'].'/');
        $uploaddir = '../../img/'.$_POST['label'].'/';
        $uploadfile = $uploaddir . basename($value);

        move_uploaded_file($value, $uploadfile);

    endif;

    header('Location:../interface.php?page='.$_POST['page'].'&success');
} catch (PDOException $e) {
    header('Location:../interfae.php?page='.$_POST['page'].'erreur');
}

