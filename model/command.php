<?php

function setNewCommand($db, $id_user_buy, $nb_product, $price)
{
    $sql = "INSERT INTO `command`(`id`, `idUserBuy`, `nbProduct`, `price`, `currency`, `status`) "
            . "VALUES (Null, '".$id_user_buy."', '".$nb_product."', '".$price."', '€', '1')";
    $r = $db->prepare($sql);
    $r->execute();

    return $r;

    
}
