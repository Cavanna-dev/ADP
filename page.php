<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/categories.php'; ?>
<br />
<?php $id_parent_category = $_GET['cat']; ?>
<?php $r_parent = getOneCategoryById($db, $id_parent_category); ?>
<?php $r_categories = getCategoriesByParentId($db, $id_parent_category); ?>
<div class="container">
    <div class="col-lg-2" id="children_categories">
        <ul class="nav nav-pills nav-stacked">
            <li class="active disabled"><a href="#"><?= $r_parent->name; ?></a></li>
            <?php while ($r_category = $r_categories->fetch(PDO::FETCH_OBJ)) { ?>
                <li><a href="#"><?= $r_category->name; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-lg-10 jumbotron" id="articles" style="padding: 0px;">
        <div class="container-fluid">
            <?php $r_articles = getAllSellableArticlesByParentCategory($db, $id_parent_category); ?>
            <?php while ($r_article = $r_articles->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="col-md-4">
                    <div class="container">
                        <img class="col-md-10" src="img/articles/<?= $r_article->id; ?>/<?= $r_article->picture; ?>"/>
                        <small><?= $r_article->brand . " " . $r_article->name; ?></small>
                        <br /><br />
                        <small><?= $r_article->price; ?></small>
                        <br /><br />
                        <a href="#" class="btn btn-primary btn-xs btn-info">Ajouter au panier</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>