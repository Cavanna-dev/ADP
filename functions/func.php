<?php


function paramConfig($label, $db){
    $sql = "SELECT value FROM config WHERE label = '".$label."' AND isActive = 1";
    $resultat = $db->query($sql);
    $resultat->execute();
    $req = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
    
    return $req['value'];    
}
