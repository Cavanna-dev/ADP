<?php


$sql = "SELECT * FROM config ";
$resultat = $db->query($sql);
$resultat->execute();
$reqInformation = $resultat->fetchAll(PDO::FETCH_ASSOC);
$resultat->closeCursor();

foreach($reqInformation as $value):
    $reqInterface[$value['label']]=$value['value'];    
endforeach;

