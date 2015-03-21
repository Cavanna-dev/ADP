<?php $selectMenu = 2; ?>
<?php

include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';
include 'model/article.php';
include 'model/listCategory.php';
?>


<div class="container">
    <h1>Information article</h1>
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <H4>Erreur, vos modifications n'ont pas été prises en compte !</H4>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <H4>Modification éffectuée aves succès !</H4>
        </div>
    <?php endif; ?>
    <div class="jumbotron">
        <form class="form-horizontal" method="POST" action="model/updateArticle.php">
            <input type="hidden" name="key" value="<?= $reqArticle['id']?>"/>
            <div class="form-group">
                <label for="name" class="col-lg-1 control-label">Nom</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?=$reqArticle['name']?>">
                </div>
                <label for="reference" class="col-lg-1 control-label">Référence</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="reference" name="reference"
                           value="<?=$reqArticle['reference']?>">
                </div>
                <label for="brand" class="col-lg-1 control-label">Marque</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="brand" name="brand"
                           value="<?=$reqArticle['brand']?>">
                </div>
                
                <label for="isActive" class="col-lg-1 control-label">Active</label>
                <div class="col-lg-2">
                    <select class="form-control
                            <?php if($reqArticle['isActive']=='1'):
                                    echo "btn-success";
                                elseif($reqArticle['isActive']=='0'):
                                    echo "btn-warning";
                                endif;
                            ?>
                            " id="isActive" name="isActive">
                        <option <?php if($reqArticle['isActive']=='1') echo 'SELECTED'; ?> 
                            class="btn-success" value="1">Oui</option>
                        <option <?php if($reqArticle['isActive']=='0') echo 'SELECTED'; ?> 
                            class="btn-default"  value="0">Non</option>
                        <?php if($reqArticle['isActive']=='2'): ?>
                            <option SELECTED  class="btn-warning" value="2">En attente</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-lg-1 control-label">Tags</label>
                <div class="col-lg-7">
                    <textarea class="form-control" rows="2" id="tags" name="tags"><?=$reqArticle['tags']?></textarea>
                  <span class="help-block">
                      La liste de TAG ne peut exceder plus de 255 caractères. Renseigner les TAGS en minuscules.
                  </span>
                </div>

                <label for="idCategory" class="col-lg-1 control-label">Catégorie</label>
                <div class="col-lg-3">
                    <select class="form-control" id="idCategory" name="idCategory">
                        <option></option>
                        <?php selectArrayForm($list, $listId, '', $reqArticle['idCategory']); ?>
                    </select>
                </div>                
            </div>

            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button type="submit" class="col-lg-8 btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
    </div>

    <h1>Fiche description</h1>
    <div class="jumbotron">
        <?php  if(isset($_GET['descriptionSucces'])):  ?>                        
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Tâche effectuée avec succès.</strong> 
            </div>                        
        <?php  endif;   ?>
        
        <?php  if(!empty($reqArticle['description'])):  ?>    
        <form class="form-horizontal" method="POST" action="model/updateDescription.php" >
            <input type="hidden" name="idDescription" value="<?=$reqArticle['idDescription']?>"/>
            <input type="hidden" name="idArticle" value="<?=$reqArticle['id']?>"/>
            <input type="hidden" name="page" value="article"/>
            <div class="form-group">
              <label for="description" class="col-lg-0 control-label"></label>
              <div class="col-lg-12">
                <textarea class="form-control" rows="3" id="description" 
                          name="description"><?=$reqArticle['description']?></textarea>
                <span class="help-block">Votre description ne peut exceder plus de 510 caractères. Au-delà, elle sera tronquée.</span>
              </div>
            </div>                             

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-0">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="model/deleteLiaison.php?key=<?=$reqArticle['id']?>"
                   onclick="return confirm('Confirmer la suppression :');"
                   class="btn btn-danger">Supprimer la liaison</a>
              </div>
            </div>
        </form>
        <?php  elseif($reqArticle['nbDescription']>0):  ?>
            <div class="form-group">
                <a href="listDescriptionArticle.php?key=<?=$reqArticle['id']?>&selectIsActive=1"
                   class="col-lg-6 col-lg-offset-3 btn btn-success">
                    <i>Description disponible : </i>
                    <span class="badge">
                        <?=$reqArticle['nbDescription']?>
                    </span>
                </a>
            </div>
           
        <?php  else:              
            $page = '';
            if( $reqArticle['nbDescriptionInactive'] == 0 ):
                $page = 'disabled';
            endif;
            ?>
            <div class="form-group">
                <a href="listDescriptionArticle.php?key=<?=$reqArticle['id']?>&selectIsActive=0"
                   class="col-lg-6 col-lg-offset-3 btn btn-warning <?=$page?>">
                    <i>Description disponible : </i>
                    <span class="badge">
                        <?=$reqArticle['nbDescription']?>
                    </span>
                </a>
            </div>
        <?php  endif;   ?>
    </div>

    <h1>Image article</h1>
    <div class="jumbotron">
        <div class="form-group">
            <div class="col-lg-6">
                <img src="../img/articles/<?=$reqArticle['id'].'/'.$reqArticle['picture']?>"
                     style="max-width:350px; max-height:250px;" />
            </div>
        </div>
        <form class="form-horizontal" method="POST" action="model/updateArticlePicture.php" enctype="multipart/form-data">
            <input type="hidden" name="key" value="<?= $reqArticle['id']?>"/>
            <input type="hidden" name="keyDel" value="<?= $reqArticle['picture']?>"/>
            <div class="form-group">
                <label for="inputImg" class="col-lg-1 control-label">Image</label>
                <div class="col-lg-5">
                    <input type="file" class="form-control" id="inputImg" name="inputImg"/>
                    </br>
                    <button type="submit" class="col-lg-12 btn btn-primary">Modifier image</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'template/footer.php'; ?>