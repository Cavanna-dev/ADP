<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ADP Project</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./home.php">Accueil</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Site Web <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="homePageCarousel.php">Gérer le diaporama de la page d'accueil</a></li>
                        <li><a href="module_Menu.php">Gérer le menu du site</a></li>
                        <li><a href="../index.php">Voir le site</a></li>
                    </ul>
                </li>
                <li class="active"><a href="#">Gérer les articles</a></li>
                <li class="active"><a href="#">Gérer les Utilisateurs du site</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user_logged']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Mes Informations</a></li>
                        <li><a href="index.php?error=logout">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>