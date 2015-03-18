<div id="menuPrincipal" class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Ttls Project</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <form class="navbar-form navbar-left">
                <input type="text" class="form-control col-lg-8" placeholder="Recherche rapide">
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!isset($_SESSION['customer'])) { ?>
                    <li><a href="form_login.php">Se Connecter</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['customer']['firstName'].' '.$_SESSION['customer']['name']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mes Informations</a></li>
                            <li><a href="logout.php">Deconnexion</a></li>
                        </ul>
                    </li>
                    <li><a href="article.php">Vendre</a></li>
                    <li><a href="basket.php">Mon Panier</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>