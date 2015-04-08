<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/categories.php'; ?>
<br />
<?php $id_parent_category = $_GET['parentCat']; ?>
<?php $r_categories = getCategoriesByParentId($db, $id_parent_category); ?>
<?php $r_category_parent = getOneCategoryById($db, $id_parent_category); ?>

<div class="container">
    <div class="col-lg-2" id="children_categories">
        <ul class="nav nav-pills nav-stacked">
            <li class="active disabled">
                <a href="page.php?parentCat=<?= $id_parent_category ?>">
                    <?= $r_category_parent->name; ?>
                </a>
            </li>
            <?php while ($r_category = $r_categories->fetch(PDO::FETCH_OBJ)) { ?>
                <li <?php if ($id_parent_category == $r_category->id) echo 'class="active disabled"'; ?>>
                    <a href="page.php?parentCat=<?= $r_category->id; ?>">
                        <?= $r_category->name; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-lg-10 jumbotron" id="articles" style="padding: 0px;">
        <div class="container-fluid">
            <table class="table table-striped table-hover" style="margin-bottom:0px;">
                <tbody>
                    <?php
                    $r_category_test = getCategoriesTest($db);
                    foreach ($r_category_test as $id => $value) {
                        $listParent[] = $value['idParent'];
                    }

                    $r_test = makeArray($id_parent_category, $r_category_test, $listParent);
                    $r_test = array_merge(array($id_parent_category), $r_test);

                    foreach ($r_test as $r_category) {
                        $r_articles = getAllSellableArticlesByCategory($db, $r_category);
                        while ($r_article_final = $r_articles->fetch(PDO::FETCH_OBJ)) {
                            ?>

                            <tr>
                                <td class="col-lg-5"><a href="article.php?key=<?= $r_article_final->id; ?>"><img src="img/articles/<?= $r_article_final->id; ?>/<?= $r_article_final->picture; ?>" style="max-width: 300px;height:180px;"/></a></td>
                                <td class="col-lg-7"><p><small><a href="article.php?key=<?= $r_article_final->id; ?>"><?= $r_article_final->name . " - " . $r_article_final->reference; ?></a></small></p>
                                    <p><small>De : <b><?= $r_article_final->brand; ?></b></small></p>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>