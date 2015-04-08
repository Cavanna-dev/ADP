
<div class="navbar navbar-inverse" style='border-radius:0px;'>
    <!--<div class="container">-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">
                <?= paramConfig('nameBo', $db)?>
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            
            <ul class="nav navbar-nav">
                
                <li <?php if($selectMenu == 0) echo 'class="active"'; ?>><a href="./home.php">Accueil</a></li>
                
                <li class="dropdown <?php if($selectMenu == 1) echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Site Web <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="homePageCarousel.php">Gestion du diaporama de la page d'accueil</a></li>
                        <li><a href="../index.php">Voir le site</a></li>
                    </ul>
                </li>
                
                <li class="dropdown <?php if($selectMenu == 2) echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion e-Commerce<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="listArticle.php">Gestion des articles</a></li>
                        <li><a href="category.php">Gestion des catégories</a></li>
                    </ul>
                </li>
                
                <li class="dropdown <?php if($selectMenu == 3) echo 'active'; ?>">
                    <a href="listUser.php">Gestion des Utilisateurs</a>
                </li>
                
                <?php if($_SESSION['user_role']>0) : ?>
                    <li class="dropdown 
                        <?php  if($selectMenu == 4) echo 'active'; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des Administrateurs<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="addAdmin.php">Création de compte</a></li>
                            <li><a href="listAdmin.php">Gestion des comptes</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                    
                <li class="dropdown <?php if($selectMenu == 6) echo 'active'; ?>">
                    <a href="listContact.php">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown 
                        <?php  if($selectMenu == 5) echo 'active'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user_firstName'].', '.$_SESSION['user_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="info.php">Mes Informations</a></li>
                        <li><a href="interface.php">Paramètres</a></li>
                        <?php if($_SESSION['user_role']>0) : ?>
                            <li><a href="saveBdd.php">Sauvegarde</a></li>
                        <?php endif; ?>
                        <li><a href="index.php?error=logout">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <!--</div>-->
</div>