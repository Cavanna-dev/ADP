<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>

<div class="container">
    <br/><br/>
   <?php if (isset($_GET['passChange'])): ?>        
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Mot de passe modifié.</h4>                    
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['userCreate'])): ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Félicitations ! Compte créé.</h4>                    
        </div>
    <?php endif; ?>
    <form class="form-horizontal col-lg-5" action="login.php" method="POST">
        <fieldset>
            <legend>Connectez-vous</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email"
                           value="<?php if(!empty($_GET['inputEmailLog'])){ echo $_GET['inputEmailLog']; }?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-3 control-label">Mot de passe</label>
                <div class="col-lg-9">
                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Rester Connecter
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-3 col-lg-offset-3">
                    <button type="submit" class="btn btn-primary">Me Connecter</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-6 col-lg-offset-3">
                    <a href='forgetPassword.php'>Mot de passe oublié</a>
                </div>
            </div>
        </fieldset>
    </form>  
    
    
    <form class="form-horizontal col-lg-7" id="form" action="registration.php" method="POST">
        <fieldset>
            <legend>Pas encore de compte ? Qu'attendez-vous ?</legend>
            
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>Une erreur s'est produite ! Merci de réessayer.</p>
                </div>
            <?php endif; ?>            
            
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                <div class="col-lg-9">
                    <input type="email" class="form-control verif" 
                           id="inputEmail" name="inputEmail" placeholder="Email"
                           value="<?php if(!empty($_GET['inputEmail'])){ echo $_GET['inputEmail']; }?>" >
                </div>
            </div>

            
            <div class="form-group">
                <label for="inputPasswordReg" class="col-lg-3 control-label">Mot de passe</label>
                <div class="col-lg-9">
                    <input type="password" class="form-control verif" 
                           id="inputPasswordReg" name="inputPasswordReg" placeholder="Mot de passe">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputConfirmPassword" class="col-lg-3 control-label">Confirmation</label>
                <div class="col-lg-9">
                    <input type="password" class="form-control verif" 
                           id="inputConfirmPassword" name="inputConfirmPassword" 
                           placeholder="Confirmer mot de passe">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputName" class="col-lg-3 control-label">Nom</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control verif" 
                           id="inputName" name="inputName" placeholder="Nom"
                           value="<?php if(!empty($_GET['inputName'])){ echo $_GET['inputName']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputFirstName" class="col-lg-3 control-label">Prénom</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control verif" 
                           id="inputFirstName" name="inputFirstName" placeholder="Prénom"
                           value="<?php if(!empty($_GET['inputFirstName'])){ echo $_GET['inputFirstName']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputAddress" class="col-lg-3 control-label">Adresse</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control verif" 
                           id="inputAddress" name="inputAddress" placeholder="Adresse"
                            value="<?php if(!empty($_GET['inputAddress'])){ echo $_GET['inputAddress']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputTown" class="col-lg-3 control-label">Ville</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control verif" 
                           id="inputTown" name="inputTown" placeholder="Ville"
                           value="<?php if(!empty($_GET['inputTown'])){ echo $_GET['inputTown']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputPost" class="col-lg-3 control-label">Code postal</label>
                <div class="col-lg-9">
                    <input type="number" class="form-control verif" id="inputPost" name="inputPost" placeholder="Code postal"
                        value="<?php if(!empty($_GET['inputPost'])){ echo $_GET['inputPost']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputDateBirth" class="col-lg-3 control-label">Date de naissance</label>
                <div class="col-lg-9">
                    <input type="date" class="form-control verif" 
                           id="inputDateBirth" name="inputDateBirth"
                           value="<?php if(!empty($_GET['inputDateBirth'])){ echo $_GET['inputDateBirth']; }?>" >
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputNumber" class="col-lg-3 control-label">
                    <?= $valueA = rand(1, 20); ?> + <?= $valueB = rand(1, 20); ?>          
                </label>
                <div class="col-lg-9">
                    <input type="number" class="form-control verif" id="inputNumber" name="inputNumber"
                        placeholder="Résultat">
                </div>
                <input type="hidden" name="inputNumberResult" 
                       id="inputNumberResult" value="<?= ($valueA+$valueB)?>" />
            </div>
            
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button type="submit" class="btn btn-primary">Je m'inscris</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function(){            
               
        $('#form').on("submit", function(){
            var value_verif = true;
            $(".verif").each(function(index){               
               if($(this).val()===''){
                   $(this).css("border-color", "#FF0000");
                   $(this).css("background-color", "#FFCDCD");
                   value_verif = false;
               }else{
                   $(this).css("border-color", "#10A41F");
                   $(this).css("background-color", "#FFFFFF");
               }
            });
                      
            if($("#inputNumber").val() != $("#inputNumberResult").val() && value_verif == true){
                alert("La somme n'est pas correct.")
                value_verif = false;
            }

            if($("#inputPasswordReg").val() != $("#inputConfirmPassword").val()){ 
                alert('Les mots de passe ne sont pas identiques.');           
                value_verif = false;
            }
            
            if(value_verif == false){
                return false;
            }        
        });
    });
</script>
<?php include 'template/footer.php'; ?>
