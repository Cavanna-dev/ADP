<?php

function getAllArticles($db)
{
    $sql = "SELECT A1.id, A1.idDescription, A1.reference, A1.name, A1.brand, A1.picture, A1.isActive, C1.name AS category, "
            . "(SELECT COUNT(id) FROM description AS D1 "
            . "WHERE D1.idArticle = A1.Id AND D1.isActive=1) AS nbDescription "
            . "FROM article AS A1 "
            . "LEFT JOIN category AS C1 ON C1.id = A1.idCategory  "
            . "ORDER BY A1.brand ASC, A1.name ASC ";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;
}
