<?php $selectMenu=1; ?>
<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<div class="container">
    
    <H1>Ajouter une photo</H1>

    <div class="jumbotron">
        <form class="form-horizontal" action="modelCarousel/addCarousel.php" method="POST" enctype="multipart/form-data">

        <fieldset>
            <div class="form-group">
                <label for="inputContent" class="col-lg-2 control-label">Contenu</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputContent" name="inputContent" placeholder="Contenu Photo">
                </div>
            </div>
            <div class="form-group">
                <label for="inputImg" class="col-lg-2 control-label">Upload photo</label>
                <div class="col-lg-10">
                    <input type="file" class="form-control" id="inputImg" name="inputImg">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIsHp" class="col-lg-2 control-label">Page d'Accueil</label>
                <div class="col-lg-10">
                    <div class="checkbox">
                        <label>
                            <input name="inputIsHp" type="checkbox" value="1">
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
            <button type="submit" class="btn btn-primary col-lg-offset-2">Sauvegarder</button>
        </form>
    </div>
</div>