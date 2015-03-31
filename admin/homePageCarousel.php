<?php $selectMenu=1; ?>
<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<div class="container">
    
        <H1>Bienvenue sur la Gestion du Carousel</H1>
    

    <?php if (isset($_GET['erreur'])) { //TODO:Pour gérer les erreurs. ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <p>Lorem Ipsum.</p>
        </div>
    <?php } ?>
<div class="jumbotron">
    <?php include './modalCarousel.php'; //Renvoi de la pop-up pour enregistrer une image ?>

    <?php include 'modelCarousel/allCarousel.php'; //Traitement MySQL pour toute les images ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>Source photo</th>
                <th>Contenu</th>
                <th>Page Accueil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($resultat = $resultats->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr class="active">
                    <td><?php echo $compteur; ?></td>
                    <td><img class="adminCarouselImg" src="../img/uploads_carousel/<?php echo $resultat->source; ?>"/></td>
                    <td><?php echo $resultat->content; ?></td>
                    <td><?php if ($resultat->isHp == 1) echo 'Oui';
            else echo 'Non'; ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#modalEdit<?php echo $resultat->id; ?>"><img class="rmvButton" src="../img/edit.png"/></a>


                        <div class="modal" id="modalEdit<?php echo $resultat->id; ?>">
                            <div class="modal-dialog">
                                <form class="form-horizontal" action="modelCarousel/editCarousel.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Modifier '<?php echo $resultat->content; ?>'</h4>
                                            <input type="hidden" name="inputId" value="<?php echo $resultat->id; ?>">
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="addCarousel.php" method="POST">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label for="inputContent" class="col-lg-2 control-label">Contenu</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="inputContent" name="inputContent" value="<?php echo $resultat->content; ?>">
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
                                                                    <input name="inputIsHp" type="checkbox" value="1" <?php if($resultat->isHp == 1) echo "checked"; ?>/>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="label label-primary">Photo ciblée</span> <?php echo $resultat->source; ?>
                                                    <br />
                                                    <div class="alert alert-dismissable alert-info">
                                                        Choississez un fichier <strong>uniquement</strong> si vous voulez modifier l'image.
                                                    </div>
                                                </fieldset>
                                        </div>
                                        <div class="modal-footer"><button type="submit" class="btn btn-primary">Sauvegarder</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <a href='modelCarousel/rmvCarousel.php?id=<?php echo $resultat->id; ?>'><img class="rmvButton" src="../img/rmv.png" onclick="return confirm('Etes-vous sur de vouloir supprimer la photo : <?php echo $resultat->source ?>?')"></a></td>
                </tr>
                <?php $compteur++; ?>
<?php } ?>
        </tbody>
    </table>
</div>
    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Préférez les images en format 1140x350 pour un rendu optimal sur votre page d'accueil.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
