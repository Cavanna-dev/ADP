<?php include 'functions/connection_db.php'; ?>
<?php include 'admin/model/listCategory.php'; ?>
<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>

<div class="container">    
    <?php if (isset($_GET['erreur'])): ?>
        <br/><div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Votre vente n'a pas été soumis !</h4>
            <p>Vérifier que vous avez rempli tous les champs ou que celui ci n'existe pas déja.</p>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['product'])): ?>
        <br/><div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Vente créé aves succès !</h4>
            <p><a href="article.php?key=<?= $_GET['product']; ?>" data-toggle="modal" >Fiche Article</a></p>
        </div>
    <?php endif; ?>


    <form class="form-horizontal" action="model/addSale.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idUserSales" value="<?= $_SESSION['customer']['idUser'] ?>"/>
        <input type="hidden" name="idArticle" value="<?= $_GET['id']; ?>"/>
        <fieldset>
            <legend>Ajouter une vente</legend>
            <div class="form-group">
                <label for="price" class="col-lg-2 control-label">Prix</label>
                <div class="col-lg-2">
                    <input type="number" class="form-control" 
                           id="price" name="price" 
                           placeholder="Prix"
                           value="" >
                </div>
                <div class="col-lg-1">
                    <select class="form-control"
                            id="currency" name="currency" >
                        <option value="euro">€</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-lg-2 control-label">Prix</label>
                <div class="col-lg-6">
                    <textarea type="" class="form-control" 
                              id="description" name="description" 
                              placeholder="Description"
                              ></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-8 col-lg-offset-2">
                    <button type="submit" id="idSubmit" class="btn col-lg-12 btn-primary">Enregistrer la vente</button>
                </div>
            </div>
        </fieldset>
    </form>

    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Votre produit va être soumis à la validation d'un administrateur.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
