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
    <form class="form-horizontal" method="POST" action="./model/contact.php" name="fp" id="form">
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
                      <input type="text" class="form-control" id="inputName" name="inputName" 
                             placeholder="Nom">
                    </div>

                    <label for="inputFirstName" class="col-lg-1 control-label">Prénom</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" 
                             placeholder="Prénom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" 
                             placeholder="Email">
                    </div>
                </div>
            <?php } ?>
          <div class="form-group">
            <label for="inputSubject" class="col-lg-2 control-label">Sujet</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputSubject" name="inputSubject" 
                     placeholder="Sujet de la demande">
            </div>
          </div>
          <div class="form-group">
            <label for="textMessage" class="col-lg-2 control-label">Demande</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="15" id="textMessage" name="textMessage"
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
                    <input type="number" class="form-control" id="inputNumber" name="inputNumber" 
                        placeholder="Résultat">
                </div>
                <input type="hidden" name="inputNumberResult" value="<?= ($valueA+$valueB)?>" />
            </div>
          <?php } ?>
          <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                <input type="submit" value="Envoyer" /> 
<!--                <button type="button" class="btn btn-primary col-lg-6"               
                    onclick="if(document.fp.inputSubject.value == ''){ alert('Veuiller renseigner un sujet !'); }
                    else if(document.fp.textMessage.value == ''){ alert('Veuiller renseigner votre message.'); }
                    else if(document.fp.inputNumber.value != document.fp.inputNumberResult.value ){ alert('Résultat incorect !'); }
                    else{ document.fp.submit();  }" >Envoyer</button>-->
            </div>
          </div>
        </fieldset>
    </form>
</div>       

<script>
    $(document).ready(function(){
        $('#form').on("submit", function(){
            alert('alors');
        });
    });
</script>

<?php include 'template/footer.php'; ?>

