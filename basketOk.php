<?php include 'template/header.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php $_SESSION['panier'] = Array(); ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'template/categories.php'; ?>
<br />
<div class="container" style="min-height: 6500px;">
    <h1>Votre Panier</h1>
    <div class="jumbotron">
        Votre commande a été validée, vous allez recevoir un mail récapitulatif de votre commande.
    </div>
</div>
<?php include 'template/footer.php'; ?>