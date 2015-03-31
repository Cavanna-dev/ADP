<?php $selectMenu = 2; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
include 'model/listCategory.php';
include 'model/listCategoryInactive.php';

?>

<div class="container">

    <?php if (isset($_GET['erreur'])) { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Une erreur s'est produite !</h4>
            <p>Veuillez réssayer.</p>
        </div>
    <?php } ?>
    <?php if (isset($_GET['category'])) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Catégorie créée aves succès !</h4>
        </div>
    <?php } ?>
    <?php if (isset($_GET['categoryUpdate'])) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Catégorie modifiée aves succès !</h4>
        </div>
    <?php } ?>

    <div class="col-lg-12">
        <h2>Ajouter une catégorie</h2>
        <div class="jumbotron">
            <form class="form-horizontal" action="model/addCategory.php" method="POST">
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Nom</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="idParent" class="col-lg-2 control-label">Catégorie parent</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="idParent" id="idParent">
                            <option value="0"></option>
                            <?php
                            selectArray($list, $listId, '', 0);
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="idAdminUser" value="<?php echo $_SESSION['user_id'];?>"/>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </div>
            </form>
        </div>
        <br/><br/><br/>
    </div>

    <div class="col-lg-6">
        <h2>Gérer les catégories actives</h2>
        <div class="jumbotron">
            <form class="form-horizontal" name="active" action="model/updateCategory.php" method="POST">
                <div class="form-group">
                    <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="idCategory" id="idCategory">
                            <option value="0"></option>
                            <?php
                            selectArray($list, $listId, '', 0);
                            ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="valueIsActive" value="0"/>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Désactiver</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <h2>Gérer les catégories inactives</h2>
        <div class="jumbotron">
            <form class="form-horizontal" name="noActive" action="model/updateCategory.php" method="POST">
                <div class="form-group">
                    <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="idCategory" id="idCategory">
                            <option><i>[Nom parent] Nom catégorie (nombre d'enfant)</i></option>
                            <?php foreach($reqInactive as $value): ?>
                                <option value="<?= $value['id']?>">
                                    <?php if($value['nameParent']!='')
                                        echo '[' . $value['nameParent'] . ']&nbsp&nbsp' ;
                                    echo $value['name'].'&nbsp&nbsp('.$value['nbChild'].')' ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="valueIsActive" value="1"/>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Activer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>
