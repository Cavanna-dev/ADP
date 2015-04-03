<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/categories.php'; ?>
<br />
<div class="container">
    <?php if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])): ?>
        <?php var_dump($_SESSION['panier']);die; ?>
<?php else: ?>
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Votre panier est vide!</h4>
        </div>
<?php endif; ?>
</div>
<?php include 'template/footer.php'; ?>