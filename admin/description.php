<?php $selectMenu = 2; ?>
<?php
include 'template/header.php';
include 'template/menu.php';

include 'model/description.php';

?>


<div class="container">
    
    
    <h1><?=$reqDescription['name']?></h1>
    <div class="col-lg-3">
        <i>Référence : <?=$reqDescription['reference']?></i>
    </div>
    <div class="col-lg-3">
        <i>Marque : <?=$reqDescription['brand']?></i>
    </div>
    <div class="col-lg-3">
        <i>Catégorie : <?=$reqDescription['category']?></i>
    </div>
    </br></br>
    
    
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
                  <div class="col-lg-6 col-lg-offset-3">
                    <button type="submit" class="btn btn-success col-lg-12">Lier avec le produit</button>
                  </div>          
                </div>
            </form>
        </div>
    <?php endif; ?>
    
    <div class="jumbotron">
        <div class="form-group">
            <a href="listDescriptionArticle.php?key=<?=$reqDescription['idArticle']?>"
               class="col-lg-2 col-lg-offset-0 btn btn-primary ">
                Retour
            </a>
        </div>
    </div> 
</div>

<?php include 'template/footer.php'; ?>