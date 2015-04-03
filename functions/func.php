<?php


function paramConfig($label, $db){
    $sql = "SELECT value FROM config WHERE label = '".$label."' AND isActive = 1";
    $resultat = $db->query($sql);
    $resultat->execute();
    $req = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
 
    return $req['value'];    
}

function paramConfigCss($label, $db){
    $sql = "SELECT value FROM config_css WHERE label = '".$label."' AND isActive = 1";
    $resultat = $db->query($sql);
    $resultat->execute();
    $req = $resultat->fetch(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
 
    return $req['value'];    
}

function paramConfigCssSelect($label, $db){
    $sql = "SELECT value FROM config_css WHERE label = '".$label."' GROUP BY value ORDER BY value ASC ";
    $resultat = $db->query($sql);
    $resultat->execute();
    $req = $resultat->fetchAll(PDO::FETCH_ASSOC);
    $resultat->closeCursor();
 
    return $req;    
}