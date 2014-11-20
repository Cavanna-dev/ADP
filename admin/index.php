<?php
include 'header.php';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'logout':
            session_destroy();
            ?>           
            <div class="container">
                <div class="jumbotron">
                    <h1>Deconnection</h1>
                    <p>Merci de vore visite !</p>
                    <p><a href="index.php" class="btn btn-primary btn-lg">Revenir à la page d'accueil</a></p>
                </div>
            </div>
            <?php
            break;
        case 'mdp':
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Mauvais mot de passe</h1>
                </div>
            </div>
        <?php default:break; ?>
    <?php }
    ?>
<?php } else { ?>
    <div class="container">
        <form class="form-horizontal" id="loginForm" action="login.php" method="POST">
            <fieldset>
                <legend>Connection</legend>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email :</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Mot de passe :</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Checkbox
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Annuler</button>
                        <button type="submit" class="btn btn-primary">Se Connecter</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
<?php } ?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $("#loginForm").submit(function (event) {
        if($("#inputEmail").val().length < 1){
            $('#inputEmail').parent('div').addClass('has-error');
            event.preventDefault();
        }else{
            $('#inputEmail').parent('div').removeClass('has-error');
        }
        if($("#inputPassword").val().length < 1){
            $('#inputEmail').parent('div').addClass('has-error');
            event.preventDefault();
        }else{
            $('#inputEmail').parent('div').removeClass('has-error');
        }
    });
</script>
<?php include 'footer.php'; ?>