<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 23/02/15
 * Time: 20:44
 */


function category($value){


    echo $value .'<br/>';

    if(array_key_exists($value, $listChild)){

       foreach($listChild[$value] as $vCat){
           return cate
       }
    }

}




$sql = "SELECT C1.name as nameChild, "
  // . "C1.level as levelChild, "
    . "(SELECT C2.name FROM categories as C2 WHERE C2.isActive=1 AND C1.idParent = C2.id) AS nameParent "
  //  . "(SELECT C2.level FROM categories as C2 WHERE C2.isActive=1 AND C1.idParent = C2.id) AS levelParent "
    . "FROM categories as C1 "
    . "WHERE C1.isActive=1 AND C1.idParent<>0 "
    . "ORDER BY C1.name ASC ";
$resultat = $db->query($sql);
$resultat->execute();
$table = $resultat->fetchAll(PDO::FETCH_ASSOC);
$nbLine = count($table);

foreach($table as $v):

    category($v['name']);






endforeach;

var_dump($listChild);

die;

/*
var_dump($table);

die;

/*

foreach($table as $value){

    echo $value['name'].'</br>';




}























/*

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
*/

die;
?>