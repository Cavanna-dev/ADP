<?php

include_once './functions/config.php';
include_once './functions/connection_db.php';

/**
 * @param type $password
 */
function hashagePass($password) {
    return md5(CONST_SALT_PRE . md5($password) . CONST_SALT_SUF);
}
