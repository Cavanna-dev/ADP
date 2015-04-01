<?php

include_once '../functions/config.php';

function hashagePass($password) {
    return md5(CONST_SALT_PRE . md5($password) . CONST_SALT_SUF);
}


$email    = htmlspecialchars($_POST['inputEmail'], ENT_QUOTES);
$password = hashagePass(htmlspecialchars($_POST['inputPassword'], ENT_QUOTES));

include_once '../functions/connection_db.php';

try {
    $resultats = $db->query("SELECT id, email, password, role, name, firstName " .
                            "FROM user " .
                            "WHERE email = '" . $email . "' AND isActive=1 "
                            , PDO::FETCH_OBJ);
    while ($resultat = $resultats->fetch()) {
        $bdId = $resultat->id;
        $bdEmail = $resultat->email;
        $bdPassword = $resultat->password;
        $bdRole = $resultat->role;
        $bdName = $resultat->name;
        $bdFirstName = $resultat->firstName;
    }

    if ($bdPassword == $password) {
        session_start();
        $_SESSION['user_logged'] = $bdEmail;
        $_SESSION['user_role']   = $bdRole;
        $_SESSION['user_id']   = $bdId;
        $_SESSION['user_name']   = $bdName;
        $_SESSION['user_firstName']   = $bdFirstName;

        header('Location: home.php');
    }else{
        if($email != $bdEmail):
            $value = "emailError";
        else:
            $value = "email=".$email;
        endif;        
        
        header('Location: index.php?mdpError&'.$value);
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>