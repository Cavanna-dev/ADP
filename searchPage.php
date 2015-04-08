<?php include 'template/header.php'; ?>
<?php include 'model/bootstrap.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'template/categories.php'; ?>
<?php $search_elements = $_GET['search']; ?>
<br />

<div class="container" style="min-height: 700px;">
    <h2>Résultat de recherche pour  : <span class="text-warning"><?= $search_elements ?></span></h2> 
    <br />
    <div class="col-lg-12 jumbotron" id="articles" style="padding: 0px;">
        <div class="container-fluid">
            <table class="table table-striped table-hover" style="margin-bottom:0px;">
                <tbody>
                    <?php
                    $r_articles = getAllSellableArticlesByNameTag($db, $search_elements);
                    while ($r_article_final = $r_articles->fetch(PDO::FETCH_OBJ)) {
                        ?>

                        <tr>
                            <td class="col-lg-5">
                                <a href="article.php?key=<?= $r_article_final->id; ?>">
                                    <img src="img/articles/<?= $r_article_final->id; ?>/<?= $r_article_final->picture; ?>" style="max-width: 300px;height:180px;"/>
                                </a>
                            </td>
                            <td class="col-lg-7">
                                <p>
                                    <small>
                                        <a href="article.php?key=<?= $r_article_final->id; ?>">
                                            <?php $name_element = explode(" ", $r_article_final->name); ?>
                                            <?php
                                            foreach ($name_element as $name):
                                                if (strpos(strtolower($name), strtolower($search_elements)) !== false) {
                                                    echo '<span class="text-warning">' . $name . '</span> - ';
                                                } else
                                                    echo $name . " - ";
                                            endforeach;
                                            ?>
                                            <?php $ref_element = explode(" ", $r_article_final->reference); ?>
                                            <?php
                                            foreach ($ref_element as $ref):
                                                if (strpos(strtolower($ref), strtolower($search_elements)) !== false) {
                                                    echo '<span class="text-warning">' . $ref . '</span>';
                                                } else
                                                    echo $ref;
                                            endforeach;
                                            ?>
                                        </a>
                                    </small>
                                </p>
                                <p>
                                    <small>De : <b><?= $r_article_final->brand; ?></b></small>
                                </p>
                                <p>
                                    <?php $tags_element = explode(" ", $r_article_final->tags); ?>
                                    <small>Tags : 
                                        <b>
                                            <?php
                                            foreach ($tags_element as $tag):
                                                if (strpos(strtolower($tag), strtolower($search_elements)) !== false) {
                                                    echo '<span class="text-warning">' . $tag . '</span> ';
                                                } else
                                                    echo $tag . " ";
                                            endforeach;
                                            ?>
                                        </b>
                                    </small>
                                </p>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>