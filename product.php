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
    <?php if (isset($_GET['product'])) { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Produit créé aves succès !</h4>
            <p><a href="" data-toggle="modal" data-target="#modalEdit<?php echo $_GET['product']; ?>">Fiche produit</a></p>
        </div>
    <?php } ?>



    <form class="form-horizontal" action="addProduct.php" method="POST" enctype="multipart/form-data">
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th><label for="brand" class="col-lg-2 control-label">Marque</label></th>
            <th><label for="reference" class="col-lg-2 control-label">Reference</label></th>
            <th><label for="name" class="col-lg-2 control-label">Nom</label></th>
            <th><label for="idFamily" class="col-lg-2 control-label">Catégorie</label></th>
            <th><label for="inputImg" class="col-lg-2 control-label">Photo</label></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <tr class="active" >
                <td style="vertical-align:middle;">
                    <input type="text" name="brand" id="brand" value="<?php if (isset($_GET['brand'])){echo $_GET['brand'];}?>">
                </td>
                <td style="vertical-align:middle;">
                    <input type="text" name="reference" id="reference" value="<?php if (isset($_GET['reference'])){echo $_GET['reference'];}?>">
                </td>
                <td style="vertical-align:middle;">
                    <input type="text" name="name" id="name" value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>">
                </td>
                <td style="vertical-align:middle;">
                    <input type="text" name="idFamily" id="idFamily" value="<?php if (isset($_GET['family'])){echo $_GET['family'];}?>">
                </td>
                <td>
                    <input type="file" class="form-control" id="inputImg" name="inputImg">
                </td>
                <td><button type="submit" class="btn btn-primary">Sauvegarder</button></td>
            </tr>
        </tbody>
    </table>
    </form>
    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Votre produit va être soumis à la validation d'un administrateur. // A mettre en base</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
