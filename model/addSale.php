<?php

include_once '../functions/connection_db.php';

$array_post = array();
foreach ($_POST as $key => $value):
    $array_post[":" . $key] = $value;
endforeach;

try {
    $sql = "INSERT INTO availability "
            . "(`id`, `idArticle`, `idUserSales`, `idOrder`, "
            . "`price`, `currency`, `description`, `status`) "
            . "VALUES "
            . "('',:idArticle,:idUserSales,NULL,"
            . ":price,:currency,:description,1)";
    $stmt = $db->prepare($sql);
    $stmt->execute($array_post);

    header('Location:../mysales.php?success');
} catch (PDOException $e) {
    die("Error : " . $e->getMessage());
}
?>