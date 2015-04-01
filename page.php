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
                <li><a href="page.php?cat=<?= $r_category->id; ?>"><?= $r_category->name; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-lg-10 jumbotron" id="articles" style="padding: 0px;">
        <div class="container-fluid">
            <?php
            $r_category_test = getCategoriesTest($db);
            foreach ($r_category_test as $id => $value) {
                $listParent[] = $value['idParent'];
            }          
            
            $r_test = makeArray($id_parent_category, $r_category_test, $listParent);
            $r_test = array_merge(array($id_parent_category), $r_test);
            
            foreach ($r_test as $r_category) {
                settype($r_category, 'integer');
                ?>
                <div class="col-md-4">
                        <?php $r_articles = getAllSellableArticlesByCategory($db, $r_category); ?>
                        <?php while ($r_article_final = $r_articles->fetch(PDO::FETCH_OBJ)) { ?>
                            <img class="col-md-3" src="img/articles/<?= $r_article_final->id; ?>/<?= $r_article_final->picture; ?>"/>
                            <small><?= $r_article_final->brand . " " . $r_article_final->name; ?></small>
                            <br /><br />
                            <small><?= $r_article_final->price; ?></small>
                            <br /><br />
                            <a href="#" class="btn btn-primary btn-xs btn-info">Ajouter au panier</a>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>