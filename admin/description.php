<?php
include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';

include 'model/description.php';

?>


<div class="container">
    <h1>Description</h1>

    <div class="jumbotron">
        <form class="form-horizontal" method="POST" action="model/updateDescription.php" >
            <input type="hidden" name="idDescription" value="<?=$reqDescription['id']?>"/>
            <input type="hidden" name="page" value="description"/>
            <div class="form-group">
              <label for="description" class="col-lg-0 control-label"></label>
              <div class="col-lg-12">
                <textarea class="form-control" rows="3" id="description" 
                          name="description"><?=$reqDescription['description']?></textarea>
                <span class="help-block">Votre description ne peut exceder plus de 510 caractères. Au-delà, elle sera tronquée.</span>
              </div>
            </div>                             

            <div class="form-group">
              <div class="col-lg-2 col-lg-offset-0">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>          
            </div>
        </form>
    </div>
    
    
    
    <div class="jumbotron">
        <form class="form-horizontal" method="POST" action="model/addLiaison.php" >
            <input type="hidden" name="idDescription" value="<?=$reqDescription['id']?>"/>
            <input type="hidden" name="idArticle" value="<?=$reqDescription['idArticle']?>"/>
                          

            <div class="form-group">
              <div class="col-lg-8 col-lg-offset-2">
                <button type="submit" class="btn btn-success col-lg-12">Lier avec le produit</button>
              </div>          
            </div>
        </form>
    </div>
</div>

<?php include 'template/footer.php'; ?>