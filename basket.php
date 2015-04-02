<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/categories.php'; ?>
<div class="container">
    <?php if(isset($_SESSION['panier'])): ?>
    <?php var_dump($_SESSION['panier']);die; ?>
    <?php endif; ?>
</div>
<?php include 'template/footer.php'; ?>