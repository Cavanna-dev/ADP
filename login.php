<?php

include_once './functions/hashagePass.php';
include_once './functions/connection_db.php';

$email = htmlspecialchars($_POST['inputEmail']);
$password = hashagePass($_POST['inputPassword']); //Fonction functions/hashagePass.php

try {
    $resultats = $db->query("SELECT id, email, password, name, firstName, isActive " .
            "FROM customer " .
            "WHERE email = '" . $email . "'"
            , PDO::FETCH_OBJ);
    while ($resultat = $resultats->fetch()) {
        $custId = $resultat->id;
        $custEmail = $resultat->email;
        $custPassword = $resultat->password;
        $custName = $resultat->name;
        $custIsActive = $resultat->isActive;
        $custFirstName = $resultat->firstName;
    }

    if (!empty($custPassword) && $custPassword == $password && $custIsActive==1) {
        session_start();
        $_SESSION['customer']['email'] = $custEmail;
        $_SESSION['customer']['idUser'] = $custId;
        $_SESSION['customer']['name'] = $custName;
        $_SESSION['customer']['firstName'] = $custFirstName;

        header('Location:index.php');
    } else
        header('Location:form_login.php?errorConn');
} catch (PDOException $e) {
    header('Location:error.php?error=' . $e->getCode());
}

