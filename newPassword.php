<?php

include 'template/header.php';
include 'template/menu.php';


if (empty($_GET['mail']) || empty($_GET['key']))
    header('Location:index.php');
    
$email  = $_GET['mail'];
$key    = $_GET['key'];


$sql = "SELECT passChange, name, email, id "
        . "FROM customer "
        . "WHERE isActive = 1 "
        . "AND email = '".$email."'";

$resultat = $db->query($sql);
$resultat->execute();
$reqPass = $resultat->fetch(PDO::FETCH_ASSOC);
$resultat->closeCursor();

$keyBdd = md5(md5($reqPass['name']).md5($reqPass['email']).md5($reqPass['name']));

if (empty($reqPass['passChange']) || $key!=$keyBdd){
    header('Location:index.php'); die;
}
?>

<div class="container">
    <br/><br/>
    <form class="form-horizontal col-lg-5" action="./model/updatePassword.php" name='fp' method="POST">
        <input type="hidden" name="id" value="<?= $reqPass['id'] ?>" >
        <input type="hidden" name="email" value="<?= $reqPass['email'] ?>" >
        <fieldset>
            <legend>Renseigner votre nouveau mot de passe</legend>
            <div class="form-group">
                <label for="inputP1" class="col-lg-4 control-label">Mot de passe</label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" id="inputP1" name="inputP1" placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group">
                <label for="inputP2" class="col-lg-4 control-label">Confirmation</label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" id="inputP2" name="inputP2" placeholder="Confirmation">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button type="button" class="btn btn-primary"
                            onclick="if(document.fp.inputP1.value == ''){ alert('Veuiller renseigner un mot de passe !'); }
				else if(document.fp.inputP2.value != document.fp.inputP1.value){ alert('Les mots de passe ne sont pas identiques.'); }
				else{ document.fp.submit();  }"                   
                            >Confirmer</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php include 'template/footer.php'; ?>
