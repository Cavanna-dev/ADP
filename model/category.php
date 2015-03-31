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
$sql = "SELECT C1.id, C1.name, C1.idParent, "
    . "(SELECT C2.name FROM category as C2 WHERE C2.id = C1.idParent AND C2.isActive=1) AS nameParent "
    . "FROM category as C1 "
    . "WHERE C1.isActive=1 "
    . "ORDER BY nameParent ASC,C1.name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

    return $req;
}

function makeArray($parent, $array, $listParent)
{
    if (!is_array($array) OR empty($array)) return FALSE;

      $list=array();

    foreach($array as $value):
        if ($value['idParent'] == $parent):

            if(!in_array($value['id'], $listParent)){
                $list[] = $value['id'];
            }else{
                $list[$value['id']] = makeArray($value['id'], $array, $listParent);
            }

        endif;
    endforeach;
    return $list;
}


?>