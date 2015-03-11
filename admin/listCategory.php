<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 23/02/15
 * Time: 20:44
 */

function makeTree($parent, $array, $listParent)
{
    if (!is_array($array) OR empty($array)) return FALSE;

    $listParent = $listParent;

    $list=array();

    foreach($array as $value):
        if ($value['idParent'] == $parent):

            if(!in_array($value['id'], $listParent)){
                $list[] = $value['name'];
            }else{
                $list[$value['name']] = makeTree($value['id'], $array, $listParent);
            }

        endif;
    endforeach;
    return $list;
}

$sql = "SELECT C1.id, C1.name, C1.idParent, "
    . "(SELECT C2.name FROM categories as C2 WHERE C2.id = C1.idParent) AS nameParent "
    . "FROM categories as C1 "
    . "WHERE C1.isActive=1 "
    . "ORDER BY C1.name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetchAll(PDO::FETCH_ASSOC);

foreach($req as $value){
    $listParent[] = $value['idParent'];
}

foreach($req as $value){
    if($value['idParent']==0){

       $list[$value['name']] = makeTree($value['id'], $req, $listParent);

    }


}


echo '<pre>';
    print_r($list);
echo '</pre>';



echo '-----------------------------------------------------<br/><br/>';

function ListageArray($tb)
{
    //Pour chaque élément du tableau...
        foreach($tb as $key => $value)
        {
            //Si l'élément est un tableau, on appelle la fonction pour qu'elle le parcoure
            if(is_array($value))
            {
                echo $key.' :<ul>';
                ListageArray($value);
                echo '</ul><br />';
            }
            else //Sinon, c'est un élément à afficher, alors on le liste !
            {
                echo '<li>'.$value.'</li>';
            }
        }
}

ListageArray($list);
die;
























$tableCategories=array();
for($a=0;$a<$nbLine;$a++){
    if($table[$a]['level'] == 1){
        $tableCategories[] = array('id'=>$table[$a]['id'], 'name'=>$table[$a]['name']);

        for($b=0;$b<$nbLine;$b++){
            if($table[$b]['level'] == 2 && $table[$b]['idParent'] == $table[$a]['id']){
                $tableCategories[] = array('id'=>$table[$b]['id'], 'name'=>'-- '.$table[$b]['name']);

                for($c=0;$c<$nbLine;$c++){
                    if($table[$c]['level'] == 3 && $table[$c]['idParent'] == $table[$b]['id']){
                        $tableCategories[] = array('id'=>$table[$c]['id'], 'name'=>'---- '.$table[$c]['name']);
                    }
                }
            }
        }
    }
}


var_dump($tableCategories);

die;
?>