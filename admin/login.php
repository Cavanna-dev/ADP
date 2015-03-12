<?php

$email    = htmlspecialchars($_POST['inputEmail']);
$password = htmlspecialchars($_POST['inputPassword']);

include_once '../functions/connection_db.php';

try {
    $resultats = $db->query("SELECT id, email, password, role " .
                            "FROM users " .
                            "WHERE email = '" . $email . "'"
                            , PDO::FETCH_OBJ);
    while ($resultat = $resultats->fetch()) {
        $bdId = $resultat->id;
        $bdEmail = $resultat->email;
        $bdPassword = $resultat->password;
        $bdRole = $resultat->role;
    }

    if ($bdPassword == $password) {
        session_start();
        $_SESSION['user_logged'] = $bdEmail;
        $_SESSION['user_role']   = $bdRole;
        $_SESSION['user_id']   = $bdId;

        header('Location: home.php');
    } else
        header('Location: index.php?error=mdp');
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>