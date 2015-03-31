<nav class="navbar navbar-default">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav col-lg-12">
                <?php $r_categories = getAllMasterCategories($db); ?>
                <?php while ($r_category = $r_categories->fetch(PDO::FETCH_OBJ)) { ?>
                    <li><a href="page.php?cat=<?= $r_category->id; ?>"><?= $r_category->name; ?></a></li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</nav>