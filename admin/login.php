<?php

$email    = htmlspecialchars($_POST['inputEmail']);
$password = htmlspecialchars($_POST['inputPassword']);

include_once '../functions/connection_db.php';

try {
    $resultats = $db->query("SELECT id, email, password, role, name, firstName " .
                            "FROM user " .
                            "WHERE email = '" . $email . "'"
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
    } else
        header('Location: index.php?error=mdp');
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>