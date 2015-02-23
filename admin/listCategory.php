<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 23/02/15
 * Time: 20:44
 */


$sql = "SELECT id, idParent, level, name "
    . "FROM categories "
    . "WHERE isActive=1 "
    . "ORDER BY level ASC, name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$table = $resultat->fetchAll();
$nbLine = count($table);


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

?>