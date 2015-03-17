<?php
include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';

include 'model/description.php';

?>


<div class="container">
    <h1>Description</h1>

    <div class="jumbotron">
         <?php  if(isset($_GET['descriptionSucces'])):  ?>                        
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Tâche effectuée avec succès.</strong> 
            </div>                        
        <?php  endif;   ?>
        <form class="form-horizontal" method="POST" action="model/updateDescription.php" >
            <input type="hidden" name="idDescription" value="<?=$reqDescription['id']?>"/>
            <input type="hidden" name="page" value="description"/>
            <div class="form-group">
                <label for="isActive" class="col-lg-1 control-label">Active</label>
                <div class="col-lg-2">
                    <select class="form-control
                            <?php if($reqDescription['isActive']=='1'):
                                    echo "btn-success";
                                elseif($reqDescription['isActive']=='0'):
                                    echo "btn-warning";
                                endif;
                            ?>
                            " id="isActive" name="isActive">
                        <option <?php if($reqDescription['isActive']=='1') echo 'SELECTED'; ?> 
                            class="btn-success" value="1">Oui</option>
                        <option <?php if($reqDescription['isActive']=='0') echo 'SELECTED'; ?> 
                            class="btn-default"  value="0">Non</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label for="description" class="col-lg-0 control-label">Description</label>
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
    
    
    <?php if($reqDescription['isActive']==1): ?>
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
    <?php endif; ?>
</div>

<?php include 'template/footer.php'; ?>