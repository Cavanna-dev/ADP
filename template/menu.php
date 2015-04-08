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
                            <li><a href="sales.php">Gérer les articles</a></li>
                            <li><a href="mysales.php">Gérer les commandes</a></li>
                            <li><a href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="basket.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
                            <span class="badge"><?php
                                if (isset($_SESSION['panier']['total']))
                                    echo $_SESSION['panier']['total'];
                                else
                                    echo "0";
                                ?></span></a>
                        <ul class="dropdown-menu" role="">
                            <?php if (isset($_SESSION['panier']['article'])): ?>
                                <?php foreach ($_SESSION['panier']['article'] as $id_basket_product): ?>
                                    <?php $r_basket_products = getAllArticlesByAvailableId($db, $id_basket_product); ?>
                                    <?php while ($r_basket_product = $r_basket_products->fetch(PDO::FETCH_OBJ)) { ?>
                                        <li><a href="#"><?= $r_basket_product->artName; ?> - <?= $r_basket_product->price; ?> €</a></li>
                                    <?php } ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li class="divider"></li>
                            <li><a href="basket.php">
                                    Voir le panier (<?php
                                    if (!isset($_SESSION['panier']['total']))
                                        echo "0 article";
                                    else if ($_SESSION['panier']['total'] == 1)
                                        echo "1 article";
                                    else if ($_SESSION['panier']['total'] > 1)
                                        echo $_SESSION['panier']['total'] . " articles";
                                    ?>)</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
