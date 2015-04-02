<?php

include 'functions/connection_db.php';
include 'model/bootstrap.php';

sendMailTo($db, "Cavanna 'Dieu' Christophe", "cavannachristophe@gmail.com", "Aurélien 'Apôtre' Léger", "leger.au@gmail.com", "pédé", "pede");

?>