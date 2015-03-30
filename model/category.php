<?php

function getAllMasterCategories($db)
{
    $sql = "SELECT id, name "
            . "FROM category "
            . "WHERE idParent = 0 AND isActive = 1";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getOneCategoryById($db, $id)
{
    $sql = "SELECT id, name "
            . "FROM category "
            . "WHERE id = ".$id;
    $r_category = $db->prepare($sql);
    $r_category->execute();
    $r = $r_category->fetch(PDO::FETCH_OBJ);

    return $r;
}

function getCategoriesByParentId($db, $id)
{
    $sql = "SELECT id, name "
            . "FROM category "
            . "WHERE idParent = ".$id." AND isActive = 1";
    $r = $db->prepare($sql);
    $r->execute();
    
    return $r;
}

?>