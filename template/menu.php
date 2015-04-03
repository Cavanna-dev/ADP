<?php
include_once 'functions/connection_db.php';
$sql = "SELECT * FROM config WHERE label = 'nameFo' ";
$resultat = $db->query($sql);
$resultat->execute();
$reqInformation = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();

$reqInterface[$reqInformation['label']] = $reqInformation['value'];
?>
<div id="menuPrincipal" class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?= $reqInterface['nameFo'] ?></a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['customer'])) { ?>
                    <li><a href="form_login.php">Se Connecter</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['customer']['firstName'] . ' ' . $_SESSION['customer']['name']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="contact.php">Votre compte</a></li>
                            <li><a href="sales.php">Vendre un article</a></li>
                            <li><a href="mysales.php">Vos commandes</a></li>
                            <li><a href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="basket.php">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
                            Mon Panier : <?php if(isset($_SESSION['panier']['total'])) echo $_SESSION['panier']['total']; else echo "0"; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>