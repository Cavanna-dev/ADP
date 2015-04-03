<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/categories.php'; ?>
<br />
<div class="container">
    <h1>Votre Panier</h1>
    <div class="jumbotron">
        <?php if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])): ?>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th style="width:20%">Image</th>
                        <th style="width:40%">Reference Produit</th>
                        <th style="width:20%">Vendeur</th>
                        <th style="width:10%">Prix</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_basket = 0; ?>
                    <?php foreach ($_SESSION['panier']['article'] as $id_basket_product): ?>
                        <?php $r_basket_products = getAllArticlesByAvailableId($db, $id_basket_product); ?>
                        <?php while ($r_basket_product = $r_basket_products->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><img src="img/articles/<?= $r_basket_product->id; ?>/<?= $r_basket_product->picture; ?>" style="width:65px;height:40px;"/></td>
                                <td><?= $r_basket_product->reference; ?></td>
                                <td><?= $r_basket_product->custName . " " . $r_basket_product->custFirstName; ?></td>
                                <td>€ <?= number_format($r_basket_product->price, 2, '.', ','); ?></td>
                                <td>
                                    <a href="delProductBasket.php?id=<?= $r_basket_product->avId; ?>">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $total_basket += $r_basket_product->price; ?>
                        <?php } ?>
                    <?php endforeach; ?>    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td></td>
                    <td></td>
                    <td>€ <?= number_format($total_basket, 2, '.', ','); ?></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <a href="delBasket.php" class="btn btn-primary">Vider le panier</a>
            <a href="delBasket.php" class="btn btn-primary pull-right">Valider la commande</a>
        <?php else: ?>
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Votre panier est vide!</h4>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include 'template/footer.php'; ?>