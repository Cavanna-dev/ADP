<?php
include_once '../functions/connection_db.php';

$id = $_GET['id'];

try {
    $sql = "DELETE FROM availability WHERE id = ".$id;
    $stmt = $db->prepare($sql);
    $stmt->execute($array_post);

    header('Location:../mysales.php?success=2');
} catch (PDOException $e) {
    die("Error : " . $e->getMessage());
}
?>