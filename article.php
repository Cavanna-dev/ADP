<?php
include_once 'functions/connection_db.php';

include 'model/article.php';
include 'template/header.php';
include 'model/bootstrap.php';
include 'template/menu.php';
include 'template/categories.php';
?>

<div class="container" style="min-height: 700px;">
    <br />
    <div class="row">
        <div class="col-lg-6">
            <img src="img/articles/<?= $reqArticle['id'] . '/' . $reqArticle['picture'] ?>"
                 style="max-width:550px; max-height:350px;" />
        </div>
        <div class="col-lg-6">
            <h3><strong><?= $reqArticle['brand'] . " - " . $reqArticle['reference'] . " - " . $reqArticle['name'] ?></strong></h3>
            <h3>De : <a href="page.php?parentCat=<?= $reqArticle['idCat'] ?>"><?= $reqArticle['category'] ?></a></h3>
            <h3>Tags associés :</h3> <?= $reqArticle['tags'] ?>
            <div class="">
                <h3>Description</h3>
                <h4>
                    <?php
                    if (empty($reqArticle['description']) == FALSE):
                        echo "Descriptif produit : " . $reqArticle['description'];
                    elseif (!isset($_GET['addDescription']) && !isset($_GET['descriptionSucces'])):
                        ?><i>Aucune description</i><br/><br/>
                        <a href="article.php?key=<?= $reqArticle['id'] ?>&addDescription">
                            Soumettre une description
                        </a><?php elseif (isset($_GET['addDescription'])):
                        ?>
                        <form class="form-horizontal" method="POST" action="model/addDescription.php" >
                            <input type="hidden" name="idUser" value="<?= $_SESSION['customer']['idUser'] ?>"/>
                            <input type="hidden" name="idArticle" value="<?= $reqArticle['id'] ?>"/>
                            <div class="form-group">
                                <label for="description" class="col-lg-0 control-label"></label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                                    <span class="help-block">Votre description ne peut exceder plus de 510 caractères. Au-delà, elle sera tronquée.</span>
                                </div>
                            </div>                             

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-0">
                                    <button type="submit" class="btn btn-primary">Soumettre</button>
                                </div>
                            </div>
                            <a href="article.php?key=<?= $reqArticle['id'] ?>">
                                Fermer le descriptif
                            </a>
                        </form>
                        <?php
                    elseif (isset($_GET['descriptionSucces'])):
                        ?>                        
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Description soumise.</strong> 
                            <br/>Merci pour votre contribution.
                        </div>                        
                        <?php
                    endif;
                    ?>
                </h4>
                </blockquote>
            </div>
        </div>
    </div>  

    <br />

    <h2>Les vendeurs disponibles</h2>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th class="col-lg-2">Prix + frais livraison</th>
                <th class="col-lg-4">Description Produit</th>
                <th class="col-lg-3">Information Vendeur</th>
                <th class="col-lg-3">Achat</th>
            </tr>
        </thead>
        <tbody>
            <?php $r_articles = getAllSellableArticlesByArticleId($db, $reqArticle['id']); ?>
            <?php while ($r_article = $r_articles->fetch(PDO::FETCH_OBJ)) { ?>
                <tr>
                    <td><h2>€ <?= $r_article->price ?></h2></td>
                    <td><small><?= $r_article->description ?></small></td>
                    <td><?= $r_article->name . " " . $r_article->firstName ?> - <a href="mailto:<?= $r_article->email ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></td>
                    <td><a href="addPanier.php?id=<?= $r_article->avId ?>" class="btn btn-info" id="addBasket" <?php if(!isset($_SESSION['customer']) || empty($_SESSION['customer'])) echo "disabled"; ?>>Ajoutez au panier</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>       


<?php include 'template/footer.php'; ?>