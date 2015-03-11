<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 23/02/15
 * Time: 20:44
 */


function makeTree($parent, $array)
{
    if (!is_array($array) OR empty($array)) return FALSE;

    $output = '<ul>';

    foreach($array as $value):
        if ($value['idParent'] == $parent):


            $output .= '<li>';
            $output .= $value['name'];
            $output .= '</li>';

            $output .= makeTree($value['id'], $array);



        endif;

    endforeach;

    $output .= '</ul>';

    return $output;
}

$sql = "SELECT C1.id, C1.name, C1.idParent "
   // . "(SELECT C2.name FROM categories as C2 WHERE C2.id = C1.idParent) AS nameParent "
    . "FROM categories as C1 "
    . "WHERE C1.isActive=1 "
    . "ORDER BY C1.name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$req = $resultat->fetchAll(PDO::FETCH_ASSOC);



foreach($req as $value){
    if($value['idParent']==0){

       // echo '<pre>';
        echo makeTree($value['id'], $req);
       // echo '</pre>';
    }


}


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