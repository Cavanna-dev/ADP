<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 13/03/15
 * Time: 12:46
 */

include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';
include 'model/article.php';
include 'model/listCategory.php';

?>


    <div class="container">
        <h1>Information article</h1>
        <div class="jumbotron">
            <form class="form-horizontal" method="POST" action="model/updateArticle.php">
                <input type="hidden" name="key" value="<?= $reqArticle[0]['id']?>"/>
                <div class="form-group">
                    <label for="name" class="col-lg-1 control-label">Nom</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?=$reqArticle[0]['name']?>">
                    </div>
                    <label for="reference" class="col-lg-2 control-label">Référence</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="reference" name="reference"
                               value="<?=$reqArticle[0]['reference']?>">
                    </div>
                    <label for="brand" class="col-lg-2 control-label">Marque</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="brand" name="brand"
                               value="<?=$reqArticle[0]['brand']?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="idCategory" name="idCategory">
                            <option></option>
                            <?php selectArrayForm($list, $listId, '', $reqArticle[0]['idCategory']); ?>
                        </select>
                    </div>
                    <label for="isActive" class="col-lg-3 control-label">Active</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="isActive" name="isActive">
                            <option <?php if($reqArticle[0]['isActive']=='1') echo 'SELECTED'; ?> value="1">Oui</option>
                            <option <?php if($reqArticle[0]['isActive']=='2') echo 'SELECTED'; ?> value="2">Non</option>
                            <?php if($reqArticle[0]['isActive']==0): ?>
                                <option SELECTED value="0">En attente</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12 col-lg-offset-3">
                        <button type="submit" class="col-lg-6 btn btn-primary">Mise à jour</button>
                    </div>
                </div>
            </form>
        </div>

        <h1>Fiche description</h1>
        <div class="jumbotron">
            <form class="form-horizontal" method="POST" action="model/updateArticlePicture.php" enctype="multipart/form-data">
                <input type="hidden" name="key" value="<?= $reqArticle[0]['id']?>"/>
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

        <h1>Image article</h1>
        <div class="jumbotron">
            <div class="form-group">
                <div class="col-lg-6">
                    <img src="../img/articles/<?=$reqArticle[0]['id'].'/'.$reqArticle[0]['picture']?>"
                         style="max-width:350px; max-height:250px;" />
                </div>
            </div>
            <form class="form-horizontal" method="POST" action="model/updateArticlePicture.php" enctype="multipart/form-data">
                <input type="hidden" name="key" value="<?= $reqArticle[0]['id']?>"/>
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
                <?php
                /*<div class="form-group">
                    <label for="selectIdCategory" class="col-lg-1 control-label">Catégorie</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="selectIdCategory" name="selectIdCategory">
                            <option></option>
                            <?php selectArrayForm($list, $listId, '', $idCategory); ?>
                        </select>
                    </div>
                    <label for="selectIsActive" class="col-lg-1 control-label">Active</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="selectIsActive" name="selectIsActive">
                            <option value=""></option>
                            <option <?php if($isActive=='1') echo 'SELECTED'; ?> value="1">Oui</option>
                            <option <?php if($isActive=='2') echo 'SELECTED'; ?> value="2">Non</option>
                            <option <?php if($isActive=='0') echo 'SELECTED'; ?> value="0">En attente</option>
                        </select>
                    </div>
                    <label for="selectIdDescription" class="col-lg-2 control-label">Fiche produit</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="selectIdDescription" name="selectIdDescription">
                            <option></option>
                            <option  <?php if($idDescription==1) echo 'SELECTED'; ?> value="1">Renseignée</option>
                            <option  <?php if($idDescription==2) echo 'SELECTED'; ?> value="2">Non renseignée</option>
                        </select>
                    </div>
                </div>

*/?>


    </div>

<?php include 'template/footer.php'; ?>