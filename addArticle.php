<?php include 'functions/connection_db.php'; ?>
<?php include 'admin/model/listCategory.php'; ?>

<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>

<div class="container">    
    <h1>Ajouter un produit</h1> 

    <?php if (isset($_GET['erreur'])): ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Votre article n'a pas été soumis !</h4>
            <p>Vérifier que vous avez rempli tous les champs ou que celui ci n'existe pas déja.</p>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['article'])): ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Article créé aves succès !</h4>
            <p><a href="article.php?key=<?= $_GET['article']; ?>" data-toggle="modal" >Fiche Article</a></p>
        </div>
    <?php endif; ?>


    <form class="form-horizontal" action="model/addArticle.php" method="POST" enctype="multipart/form-data">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th><label for="brand" class="col-lg-2 control-label">Marque</label></th>
                <th><label for="reference" class="col-lg-2 control-label">Reference</label></th>
                <th><label for="name" class="col-lg-2 control-label">Nom</label></th>
                <th><label for="idCategory" class="col-lg-2 control-label">Catégorie</label></th>
                <th><label for="inputImg" class="col-lg-2 control-label">Photo</label></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr class="active" >
                    <input type="hidden" name="idUser" value="<?=$_SESSION['customer']['idUser']?>"/>
                    <td style="vertical-align:middle;">
                        <input type="text" name="brand" id="brand" value="<?php if (isset($_GET['brand'])){echo $_GET['brand'];}?>"/>
                    </td>
                    <td style="vertical-align:middle;">
                        <input type="text" name="reference" id="reference" value="<?php if (isset($_GET['reference'])){echo $_GET['reference'];}?>"/>
                    </td>
                    <td style="vertical-align:middle;">
                        <input type="text" name="name" id="name" value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>"/>
                    </td>
                    <td style="vertical-align:middle;">
                        <select class="selectpicker" name="idCategory" id="idCategory">
                            <option value=""></option>
                            <?php selectArray($list, $listId, ''); ?>
                        </select>

                    </td>
                    <td>
                        <input type="file" class="form-control" id="inputImg" name="inputImg"/>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Sauvegarder</button></td>
                </tr>
            </tbody>
        </table>
    </form>

    
    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Votre produit va être soumis à la validation d'un administrateur.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
