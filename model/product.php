<?php

function getAllArticles($db)
{
    $sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.picture, A1.tags, A1.isActive, C1.name AS category, "
            . "(SELECT COUNT(id) FROM description AS D1 "
            . "WHERE D1.idArticle = A1.Id AND D1.isActive=1) AS nbDescription "
            . "FROM article AS A1 "
            . "LEFT JOIN category AS C1 ON C1.id = A1.idCategory  "
            . "WHERE A1.isActive <> 0 "
            . "ORDER BY A1.brand ASC, A1.name ASC ";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getAllSellableArticlesByCategory($db, $id)
{
    $sql = "SELECT av.price, art.id, art.picture, art.brand, art.name, art.reference "
            . "FROM availability av "
            . "LEFT JOIN article art ON av.idArticle = art.id "
            . "LEFT JOIN category cat ON art.idCategory = cat.id "
            . "WHERE art.idCategory = '" . $id . "' "
            . "GROUP BY idArticle";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getAllSellableArticlesByNameTag($db, $string)
{
    $sql = "SELECT av.price, art.id, art.picture, art.brand, art.name, art.reference, art.tags "
            . "FROM availability av "
            . "LEFT JOIN article art ON av.idArticle = art.id "
            . "LEFT JOIN category cat ON art.idCategory = cat.id "
            . "WHERE art.name LIKE '%" . $string . "%' OR art.tags LIKE '%" . $string . "%' OR art.reference LIKE '%" . $string . "%'"
            . "GROUP BY idArticle";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getAllSellableArticlesByArticleId($db, $id)
{
    $sql = "SELECT av.id as avId, av.price, av.description, art.id, art.picture, art.brand, art.name, art.reference, "
            . "av.idUserSales, cust.name, cust.firstName, cust.email "
            . "FROM availability av "
            . "LEFT JOIN article art ON av.idArticle = art.id "
            . "LEFT JOIN category cat ON art.idCategory = cat.id "
            . "LEFT JOIN customer cust ON av.idUserSales = cust.id "
            . "WHERE av.idArticle = '" . $id . "' AND av.status = 1 AND av.isActive = 1";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function getAllArticlesByAvailableId($db, $id)
{
    $sql = "SELECT av.id as avId, av.price, av.currency, av.description, art.id, art.picture, art.brand, art.name as 'artName', art.reference, "
            . "av.idUserSales, cust.name 'custName', cust.firstName as 'custFirstName', cust.email "
            . "FROM availability av "
            . "LEFT JOIN article art ON av.idArticle = art.id "
            . "LEFT JOIN category cat ON art.idCategory = cat.id "
            . "LEFT JOIN customer cust ON av.idUserSales = cust.id "
            . "WHERE av.id = '" . $id . "' AND av.status = 1 AND av.isActive = 1";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

function setAvailableOnNull($db, $id, $id_command)
{
    $sql = "UPDATE `availability` SET `idCommand`=".$id_command.", `status`=2 "
            . "WHERE id = '" . $id . "'";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

?>
