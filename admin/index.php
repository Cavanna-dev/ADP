<?php
include 'template/header.php';

if(isset($_GET['error']) && $_GET['error']=='logout'):
    session_destroy();
    ?>           
    <div class="container">
        <br/><br/><br/>
        <div class="jumbotron">
            <h1>Deconnection</h1>
            <p>Merci de vore visite !</p>
            <p><a href="index.php" class="btn btn-primary btn-lg">Revenir à la page d'accueil</a></p>
        </div>
    </div>
<?php else: ?>        
    <div class="container">
        <br/><br/><br/>
        <div class="jumbotron col-lg-10">
            <form class="form-horizontal" id="loginForm" action="login.php" method="POST">
                <fieldset>
                    <legend>Connection</legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">Email :</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" id="inputEmail" name="inputEmail" 
                                   <?php if(isset($_GET['email'])){ echo 'value="'.$_GET['email'].'"'; } ?>
                                   placeholder="Email">
                        </div>
                         <?php if(isset($_GET['emailError'])) : ?>
                            <div class="col-lg-4">
                                <h4 style="color:red; font-weight: bold;">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Email incorrect ! </h4>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-3 control-label">Mot de passe :</label>
                        <div class="col-lg-5">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                        </div>
                        
                        <?php if(isset($_GET['mdpError'])) : ?>
                            <div class="col-lg-4">
                                <h4 style="color:red; font-weight: bold;">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Mot de passe incorrect ! </h4>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-4">
                            <button type="submit" class="btn btn-primary col-lg-5">Se Connecter</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
<?php endif; ?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $("#loginForm").submit(function (event) {
        if ($("#inputEmail").val().length < 1) {
            $('#inputEmail').parent('div').addClass('has-error');
            event.preventDefault();
        } else {
            $('#inputEmail').parent('div').removeClass('has-error');
        }
        if ($("#inputPassword").val().length < 1) {
            $('#inputPassword').parent('div').addClass('has-error');
            event.preventDefault();
        } else {
            $('#inputPassword').parent('div').removeClass('has-error');
        }
    });
</script>
<?php include 'template/footer.php'; ?>