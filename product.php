<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 18/02/15
 * Time: 19:21
 */
?>
<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<div class="container">
    <div class="jumbotron">
        Ajouter un produit
    </div>

    <?php if (isset($_GET['erreur'])) { // TODO:Pour gérer les erreurs. ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <p>Lorem Ipsum.</p>
        </div>
    <?php } ?>
    <?php if (isset($_GET['valid'])) { // TODO:Pour gérer les produits créés. ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Produit créé aves succès!</h4>
            <p>Fiche produit</p>
        </div>
    <?php } ?>




    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>Marque</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Catégorie</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr class="active" >
                <form class="form-horizontal" action="addProduct.php" method="POST" enctype="multipart/form-data">
                    <td style="vertical-align:middle;"><input type="text" name="brand" id="brand" value=""></td>
                    <td style="vertical-align:middle;"><input type="text" name="reference" id="reference" value=""></td>
                    <td style="vertical-align:middle;"><input type="text" name="name" id="name" value=""></td>
                    <td style="vertical-align:middle;"><input type="text" name="idFamily" id="idFamily" value=""></td>
                    <td><button type="submit" class="btn btn-primary">Sauvegarder</button></td>
                </form>
            </tr>
        </tbody>
    </table>
    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Votre produit va être soumis à la validation d'un administrateur. // A mettre en base</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
