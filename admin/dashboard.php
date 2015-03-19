
<?php include 'model/dashboard.php'; ?>

<h1>Dashboard</h1>
<div class="jumbotron col-lg-7">        
    <fieldset>
        <legend>Articles</legend>
        <div class="form-group">
            <div class="col-lg-3">
                <small>Total</small>
                <p onclick="document.location='listArticle.php'" style="cursor: pointer;">
                    <?= $reqDashboard['articleTotal'] ?>
                </p>
            </div>
            <div class="col-lg-3">
                <small>Actif</small>
                <p onclick="document.location='listArticle.php?selectIsActive=1'" style="cursor: pointer;">
                    <?= $reqDashboard['articleActif'] ?>
                </p>
            </div>
            <div class="col-lg-3">
                <small>En Attente</small>
                <p onclick="document.location='listArticle.php?selectIsActive=2'" style="cursor: pointer;">
                    <?= $reqDashboard['articleEnAttente'] ?>
                </p>
            </div>
            <div class="col-lg-3">
                <small>Inactif</small>
                <p onclick="document.location='listArticle.php?selectIsActive=0'" style="cursor: pointer;">
                    <?= $reqDashboard['articleInactif'] ?>
                </p>
            </div>
        </div>
    </fieldset>
</div>

<div class="jumbotron col-lg-4 col-lg-offset-1"> 
    <fieldset>
        <legend>Utilisateurs</legend>
        <div class="form-group">
            <div class="col-lg-4">
                <small>Total</small>
                <p onclick="document.location='listUser.php'" style="cursor: pointer;">
                    <?= $reqDashboard['customerTotal'] ?>
                </p>
            </div>
            <div class="col-lg-4">
                <small>Actif</small>
                <p onclick="document.location='listUser.php?selectIsActive=1'" style="cursor: pointer;">
                    <?= $reqDashboard['customerActif'] ?>
                </p>
            </div>
            <div class="col-lg-4">
                <small>Inactif</small>
                <p onclick="document.location='listUser.php?selectIsActive=0'" style="cursor: pointer;">
                    <?= $reqDashboard['customerInactif'] ?>
                </p>
            </div>
        </div>
    </fieldset>
</div>

<div class="jumbotron col-lg-7"> 
    <fieldset>
        <legend>Descriptions *</legend>
        <div class="form-group">
            <div class="col-lg-3 col-lg-offset-0">
                <small>Pourcentage d'article avec description</small>
                <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=r'" style="cursor: pointer;">
                    <?= number_format($reqDashboard['adp'], 0, '.', '') ?> %
                </p>
            </div>
            <div class="col-lg-3 col-lg-offset-1">
                <small>Article sans description, description disponible</small>
                <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=nrX'" style="cursor: pointer;">
                    <?= $reqDashboard['articleDescriptionDispo'] ?>
                </p>
            </div>
            <div class="col-lg-3 col-lg-offset-1">
                <small>Article sans description disponible<br/></small>
                <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=nr0'" style="cursor: pointer;">
                    <?= $reqDashboard['articleDescriptionNoDispo'] ?>
                </p>
            </div>            
        </div>
    </fieldset>
    <i>* Sur les articles actifs et en attentes</i>
</div>

<div class="jumbotron col-lg-4 col-lg-offset-1"> 
    <fieldset>
        <legend>Tags</legend>
        <div class="form-group">
            <div class="col-lg-4">
                <small>Total</small>
                <p onclick="document.location='listUser.php'" style="cursor: pointer;">
                    <?= $reqDashboard['tagTotal'] ?>
                </p>
            </div>
            <div class="col-lg-4">
                <small>Actif</small>
                <p onclick="document.location='listUser.php?selectIsActive=1'" style="cursor: pointer;">
                    <?= $reqDashboard['tagActif'] ?>
                </p>
            </div>
            <div class="col-lg-4">
                <small>Inactif</small>
                <p onclick="document.location='listUser.php?selectIsActive=0'" style="cursor: pointer;">
                    <?= $reqDashboard['tagInactif'] ?>
                </p>
            </div>
        </div>
    </fieldset>
</div>