<?php 

function getSalesByUser($db, $id)
{
    $sql = "SELECT av.id, av.idArticle, art.reference, art.name, av.price, av.currency, av.description, av.status "
            . "FROM availability av "
            . "LEFT JOIN article art on av.idArticle = art.id "
            . "WHERE av.idUserSales = ".$id." "
            . "ORDER BY av.dateChange";
    $r = $db->prepare($sql);

    return $r;
}

 ?>