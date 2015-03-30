<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>

<div class="container">    
    <h1>Liste des articles</h1> 
    <a href="addArticle.php" class="btn btn-primary">Créer une référence</a>
    <br /><br /><?php $r_products = getAllArticles($db); ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Tags associés</th>
                <th>Statut</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r_product = $r_products->fetch(PDO::FETCH_OBJ)) { ?>
                <tr class="<?php
                if ($r_product->isActive == 1) {
                    echo "success";
                }
                if ($r_product->isActive == 2) {
                    echo "warning";
                }
                ?>">
                    <td><a href="article.php?key=<?= $r_product->id ?>"><?= $r_product->reference; ?></a></td>
                    <td><img src="img/articles/<?= $r_product->id . "/" . $r_product->picture; ?>" style="width:25px;height:25px;"/></td>
                    <td><?= $r_product->name; ?></td>
                    <td><?= $r_product->tags; ?></td>
                    <td>
                        <?php
                        if ($r_product->isActive == 1) {
                            echo"Validé";
                        }
                        if ($r_product->isActive == 2) {
                            echo"En attente de validation";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($r_product->idDescription != NULL)
                            echo "Validée";
                        else echo "En attente";
                        ?>
                    </td>
                    <td>
                        <a href="addProduct.php?id=<?= $r_product->id; ?>" class="btn btn-info">Vendre cet article</a>
                    </td>
                </tr>
<?php } ?>
        </tbody>
    </table>


    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Chaque produit est soumis à la validation d'un administrateur.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
