<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 13/03/15
 * Time: 10:09
 */

$valueIsActive[0] = 'En attente';
$valueIsActive[1] = 'Oui';
$valueIsActive[2] = 'Non';

@$name = htmlspecialchars($_GET['inputName'], ENT_QUOTES);
@$ref = htmlspecialchars($_GET['inputRef'], ENT_QUOTES);
@$brand = htmlspecialchars($_GET['inputBrand'], ENT_QUOTES);
@$idCategory = $_GET['selectIdCategory'];
@$isActive = $_GET['selectIsActive'];
@$idDescription = $_GET['selectIdDescription'];


$where=''; $limit = '';
if(!empty($name)){ $where .= "AND A1.name LIKE '%".$name."%' "; }
if(!empty($ref)){ $where .= "AND A1.reference LIKE '%".$ref."%' "; }
if(!empty($brand)){ $where .= "AND A1.brand LIKE '%".$brand."%' "; }
if(!empty($idCategory)){ $where .= "AND A1.idCategory = '".$idCategory."' "; }
if(!empty($isActive)){ $where .= "AND A1.isActive = '".$isActive."' "; }
if(!empty($idDescription) && $idDescription==0){ $where .= "AND A1.idDescription IS NULL "; }
if(!empty($idDescription) && $idDescription==1){ $where .= "AND A1.idDescription IS NOT NULL "; }


// 0 - En attente // 1 - Validé // 2 - Refusé
if($where=='')
    $limit = ' LIMIT 0, 30 ';

$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.picture, A1.isActive, C1.name AS category "
    . "FROM articles AS A1 LEFT JOIN categories AS C1 ON C1.id = A1.idCategory  "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY A1.brand ASC, A1.name ASC "
    . $limit;
$resultat = $db->query($sql);
$resultat->execute();
$reqListArticle = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

