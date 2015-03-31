<?php $selectMenu = 5; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
include 'model/interface.php';
?>


<div class="container">
    <h1>Paramètres</h1>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <H4>Erreur, vos modifications n'ont pas été prises en compte !</H4>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <H4>Modification éffectuée aves succès !</H4>
        </div>
    <?php endif; ?>
    
    <div class="jumbotron">
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="value" class="col-lg-3 control-label">Nom du site web</label>
                <input type='hidden' name='label' value='nameFo' />
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="value" name="value"
                           value="<?=$reqInterface['nameFo']?>">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="value" class="col-lg-3 control-label">Nom de l'administration</label>
                <input type='hidden' name='label' value='nameBo' />
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="value" name="value"
                           value="<?=$reqInterface['nameBo']?>">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="value" class="col-lg-3 control-label">Adresse mail contact</label>
                <input type='hidden' name='label' value='emailContact' />
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="value" name="value"
                           value="<?=$reqInterface['emailContact']?>">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'template/footer.php'; ?>
