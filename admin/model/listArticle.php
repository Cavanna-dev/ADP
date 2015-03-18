<?php

$valueIsActive[2] = 'En attente';
$valueIsActive[1] = 'Oui';
$valueIsActive[0] = 'Non';

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
if(!empty($isActive) || $isActive=='0'){ $where .= "AND A1.isActive = '".$isActive."' "; }
if(!empty($idDescription) && $idDescription=='nr'){ $where .= "AND A1.idDescription IS NULL "; }
if(!empty($idDescription) && $idDescription=='r'){ $where .= "AND A1.idDescription IS NOT NULL "; }



if($where=='')
    $limit = ' LIMIT 0, 30 ';

$sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.picture, A1.isActive, C1.name AS category, "
    . "(SELECT COUNT(id) FROM description AS D1 WHERE D1.idArticle = A1.Id AND D1.isActive=1) AS nbDescription "
    . "FROM articles AS A1 LEFT JOIN categories AS C1 ON C1.id = A1.idCategory  "
    . "WHERE 1=1 "
    . $where
    . "ORDER BY A1.brand ASC, A1.name ASC "
    . $limit;
$resultat = $db->query($sql);
$resultat->execute();
$reqListArticle = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

