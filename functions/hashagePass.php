<?php
include_once 'config.php';

/**
 * 
 * @param type $password
 */
function hashagePass($password){
    return md5(CONST_SALT_PRE. md5($password) . CONST_SALT_SUF);
}
