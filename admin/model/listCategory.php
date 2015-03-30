<?php

/* ---------------- FUNCTION POUR METTRE EN ARRAY LES CATEGORIES ---------------- */
function makeArray($parent, $array, $listParent)
{
    if (!is_array($array) OR empty($array)) return FALSE;

      $list=array();

    foreach($array as $value):
        if ($value['idParent'] == $parent):

            if(!in_array($value['id'], $listParent)){
                $list[] = $value['name'];
            }else{
                $list[$value['name']] = makeArray($value['id'], $array, $listParent);
            }

        endif;
    endforeach;
    return $list;
}

/* ---------------- FUNCTION POUR METTRE EN LIST UN TABLEAU ---------------- */
function listageArray($tb, $id)
{
    foreach($tb as $key => $value)
    {
        if(is_array($value))
        {
            echo $id[$key].' - '.$key.' :<ul>';
            listageArray($value, $id);
            echo '</ul><br />';
        }
        else
        {
            echo '<li>'.$id[$value].' - '.$value.'</li>';
        }
    }
}

/* ---------------- FUNCTION POUR METTRE EN SELECT UN TABLEAU ---------------- */
function selectArray($tb, $id, $tiret, $lvl)
{
    if($lvl!=0)
        $tiret = $tiret.'&nbsp;&nbsp;';
    
    foreach($tb as $key => $value)
    {
        if(is_array($value))
        {
            echo '<option '
            . ' style="background-color:#EDEDED;" '
            . 'value='.$id[$key].'>'.$tiret.$key.'</option>';
            selectArray($value, $id, $tiret, 1);
        }
        else
        {
            echo '<option value='.$id[$value].'>'.$tiret.$value.'</option>';
        }
    }
}

/* ---------------- FUNCTION POUR METTRE EN SELECT UN FORMULAIRE ---------------- */
function selectArrayForm($tb, $id, $tiret, $valueSelected, $lvl)
{
    if($lvl!=0)
        $tiret = $tiret.'&nbsp;&nbsp;&nbsp;';
    
    foreach($tb as $key => $value)
    {
        if(is_array($value))
        {
            echo '<option '
            . ' style="background-color:#EDEDED;" ';
            if($valueSelected == $id[$key]){ echo ' SELECTED '; }
            echo 'value='.$id[$key].'>'
                    .   $tiret
                    .   $key.'</option>';
             
            selectArrayForm($value, $id, $tiret, $valueSelected, 1);
        }
        else
        {
            echo '<option ';
            if($valueSelected == $id[$value]){ echo ' SELECTED '; }
            echo ' value='.$id[$value].'>'.$tiret
                    .   $value.'</option>';
        }
    }
}


/* ---------------- REQUETE POUR SELECTIONNER LES CATEGORIES ---------------- */
$sql = "SELECT C1.id, C1.name, C1.idParent, "
    . "(SELECT C2.name FROM category as C2 WHERE C2.id = C1.idParent AND C2.isActive=1) AS nameParent "
    . "FROM category as C1 "
    . "WHERE C1.isActive=1 "
    . "ORDER BY nameParent ASC,C1.name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();


/* ------LIST POUR CE QUI ONT DES ENFANTS ------- */
// UTILISER POUR LA FONCTION makeArray

foreach($req as $value){
    $listParent[] = $value['idParent'];
}

/* ------LIST LIAISON ENTRE ID ET VALUES ------- */
// UTILISER POUR LA FONCTION listageArray
$listId=array();
foreach($req as $value){
    $listId[$value['name']] = $value['id'];
}

/* ------ LANCEMENT DE LA FNCTION POUR LES PARENTS ------- */
$list=array();
foreach($req as $value){
    if($value['idParent']==0){
       $list[$value['name']] = makeArray($value['id'], $req, $listParent);
    }
}

?>