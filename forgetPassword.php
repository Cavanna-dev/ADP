<?php
    include 'template/header.php';
    include 'template/menu.php';
?>

<div class="container">
    <br/><br/>
    <?php if (isset($_GET['error'])): ?>
        <div class="col-lg-12">
            <div class="alert alert-dismissable alert-warning col-lg-5">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Erreur ! </h4>
                <p>Aucune correspondance n'a été trouvée.</p>
            </div>
        </div>
    <?php endif; ?>
     <?php if (isset($_GET['success'])): ?>
        <div class="col-lg-12">
            <div class="alert alert-dismissable alert-success col-lg-5">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Un mail vous a été envoyé ! </h4>
                <p>Merci de clicker sur le lien dans le mail.</p>
            </div>
        </div>
    <?php endif; ?>
    <form class="form-horizontal col-lg-5" action="./model/check_email.php" id='fp' method="POST">
        <fieldset>
            <legend>Mot de passe oublié</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                <div class="col-lg-8">
                    <input type="email" class="form-control" id="inputEmail" 
                           name="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-lg-4 control-label">Nom</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="inputName" 
                           name="inputName" placeholder="Nom">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button type="submit" id='form' class="btn btn-primary">Confirmer</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php include 'template/footer.php'; ?>
