<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>

<div class="container">    
    <h1>A vendre</h1> 
    <a href="addArticle.php" class="btn btn-primary">Ajouter un produit</a>
    <br /><br /><?php $r_products = getAllArticles($db); ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r_product = $r_products->fetch(PDO::FETCH_OBJ)) { ?>
            <tr>
                <td><?= $r_product->reference; ?></td>
                <td><?= $r_product->name; ?></td>
                <td><a href="#" onclick="return confirm('La suppression de cette vente entrainera la disparition définitive des données liées à cette vente.')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Chaque produit est soumis à la validation d'un administrateur.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
