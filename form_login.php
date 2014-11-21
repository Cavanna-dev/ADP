<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<div class="container">
    <form class="form-horizontal col-lg-6" action="login.php" method="POST">
        <fieldset>
            <legend>Connectez-vous</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Rester Connecter
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Me Connecter</button>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal col-lg-6" action="registration.php" method="POST">
        <fieldset>
            <legend>Pas encore de compte? Qu'attendez-vous?</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group">
                <label for="inputConfirmPassword" class="col-lg-2 control-label">Confirmation</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirmer mot de passe">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Je m'inscris</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php include 'template/footer.php'; ?>
