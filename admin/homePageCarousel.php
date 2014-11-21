<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<div class="container">
    <div class="jumbotron">
        Bienvenue sur la Gestion du Carousel
    </div>

    <?php if (isset($_GET['erreur'])) { //TODO:Pour gérer les erreurs. ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <p>Lorem Ipsum.</p>
        </div>
    <?php } ?>

    <?php include './modalCarousel.php'; //Renvoi de la pop-up pour enregistrer une image ?>

    <?php include './allCarousel.php'; //Traitement MySQL pour toute les images ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>Source photo</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($resultat = $resultats->fetch()) {
                ?>
                <tr class="active">
                    <td><?php echo $compteur; ?></td>
                    <td><img class="carouselImg" src="../img/uploads_carousel/<?php echo $resultat->source; ?>"/></td>
                    <td><?php echo $resultat->content; ?></td>
                    <td><a href="#"><img class="rmvButton" src="../img/edit.png"/></a>
                        <a href='rmvCarousel.php?id=<?php echo $resultat->id; ?>'><img class="rmvButton" src="../img/rmv.png" onclick="return confirm('Etes-vous sur de vouloir supprimer la photo : <?php echo $resultat->source?>?')"></a></td>
                </tr>
                <?php $compteur++; ?>
            <?php } ?>
            </tbody>
        </table> 

    </div>
    <?php include 'template/footer.php'; ?>
