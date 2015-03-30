<?php
include 'template/header.php';
include 'template/menu.php';
?>


<div class="container">
    <h1>Formulaire de contact</h1>
     <?php if (isset($_GET['success'])): ?>
        <br/><div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Demande envoyée avec succès !</h4>
            <p>Merci pour votre contribution.</p>
        </div>
    <?php endif; ?>
    <form class="form-horizontal" method="POST" action="./model/contact.php" id="form">
        <fieldset>
          <legend></legend>
           <?php if(!empty($_SESSION['customer']['name'])){ ?>
                <input type="hidden" name="inputId" value="<?= $_SESSION['customer']['idUser']?>">
                <input type="hidden" name="inputName" value="<?= $_SESSION['customer']['name']?>">
                <input type="hidden" name="inputFirstName" value="<?= $_SESSION['customer']['firstName']?>">
                <input type="hidden" name="inputEmail" value="<?= $_SESSION['customer']['email']?>">
            <?php }else{ ?>
                <div class="form-group">
                    <input type="hidden" name="inputId" value="NULL">
                    <label for="inputName" class="col-lg-2 control-label">Nom</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control verif" id="inputName" name="inputName"
                             placeholder="Nom">
                    </div>

                    <label for="inputFirstName" class="col-lg-1 control-label">Prénom</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control verif" id="inputFirstName" name="inputFirstName" 
                             placeholder="Prénom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control verif" id="inputEmail" name="inputEmail"
                             placeholder="Email">
                    </div>
                </div>
            <?php } ?>
          <div class="form-group">
            <label for="inputSubject" class="col-lg-2 control-label">Sujet</label>
            <div class="col-lg-10">
              <input type="text" class="form-control verif" id="inputSubject" name="inputSubject"
                     placeholder="Sujet de la demande">
            </div>
          </div>
          <div class="form-group">
            <label for="textMessage" class="col-lg-2 control-label">Demande</label>
            <div class="col-lg-10">
              <textarea class="form-control verif" rows="15" id="textMessage" name="textMessage"
                        placeholder="Votre demande"></textarea>
              <span class="help-block"></span>
            </div>
          </div>
          <?php if(empty($_SESSION['customer']['name'])){ ?>
            <div class="form-group">
                <label for="inputNumber" class="col-lg-2 control-label">
                    <?= $valueA = rand(1, 20); ?> + <?= $valueB = rand(1, 20); ?>          
                </label>
                <div class="col-lg-2">
                    <input type="number" class="form-control verif" id="inputNumber" name="inputNumber"
                        placeholder="Résultat">
                </div>
                <input type="hidden" name="inputNumberResult" 
                       id="inputNumberResult" value="<?= ($valueA+$valueB)?>" />
            </div>
          <?php } ?>
          <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <input type="submit" class="btn btn-primary col-lg-6" value="Envoyer" /> 
            </div>
          </div>
        </fieldset>
    </form>
</div>       

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
            
            if(value_verif == false){
                return false;
            }        
        });
    });
</script>

<?php include 'template/footer.php'; ?>

