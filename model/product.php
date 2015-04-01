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
            . "WHERE art.idCategory = '".$id."'";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}

?>
