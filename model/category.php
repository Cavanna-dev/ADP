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
            . "WHERE id = " . $id;
    $r_category = $db->prepare($sql);
    $r_category->execute();
    $r = $r_category->fetch(PDO::FETCH_OBJ);

    return $r;
}

function getCategoriesByParentId($db, $id)
{
    $sql = "SELECT id, name "
            . "FROM category "
            . "WHERE idParent = " . $id . " AND isActive = 1";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getCategoriesTest($db)
{
$sql = "SELECT C1.id, C1.idParent "
    . "FROM category as C1 "
    . "WHERE C1.isActive=1 "
    . "ORDER BY C1.id ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

    return $req;
}

function makeArray($parent, $array, $listParent)
{
    // if (!is_array($array) OR empty($array)) return FALSE;

    $list = array();
    // var_dump($list);
    
    foreach($array as $value):
        if ($value['idParent'] == $parent):

            $list[] = $value['id'];
        
           if(in_array($value['id'], $listParent)){       
               $list = array_merge($list, makeArray($value['id'], $array, $listParent));                
           }

        endif;
    endforeach;   
    
    return $list;
}


?>