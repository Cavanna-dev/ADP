<?php $selectMenu = 2; ?>
<?php
include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';
include 'model/listArticle.php';
include 'model/listCategory.php';
?>


<div class="container">
    <h1>Liste des articles</h1>

    <div class="jumbotron">
        <form class="form-horizontal" method="GET" action="listArticle.php">
            <fieldset>
                <legend>Filtres</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-1 control-label">Nom</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="inputName" name="inputName" value="<?=$name?>">
                    </div>
                    <label for="inputRef" class="col-lg-2 control-label">Référence</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="inputRef" name="inputRef" value="<?=$ref?>">
                    </div>
                    <label for="inputBrand" class="col-lg-2 control-label">Marque</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="inputBrand" name="inputBrand" value="<?=$brand?>">
                    </div>
                </div>
                <div class="form-group">
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
                            <option <?php if($isActive=='0') echo 'SELECTED'; ?> value="0">Non</option>
                            <option <?php if($isActive=='2') echo 'SELECTED'; ?> value="2">En attente</option>
                            <?php if($isActive=='3'){ ?><option SELECTED value="">Exclusion Non</option> <?php } ?>
                        </select>
                    </div>
                    <label for="selectIdDescription" class="col-lg-2 control-label">Fiche produit</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="selectIdDescription" name="selectIdDescription">
                            <option></option>
                            <option  <?php if($idDescription=='r') echo 'SELECTED'; ?> value="r">Renseignée</option>
                            <option  <?php if($idDescription=='nrX') echo 'SELECTED'; ?> value="nrX">Non renseignée (x)</option>
                            <option  <?php if($idDescription=='nr0') echo 'SELECTED'; ?> value="nr0">Non renseignée (0)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="col-lg-8 btn btn-primary">Afficher</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="jumbotron">
        <table class="table table-striped table-hover table-responsive">
          <thead>
            <tr>
              <th>Image</th>
              <th>Nom</th>
              <th>Référence</th>
              <th>Marque</th>
              <th>Catégorie</th>
              <th>Actif</th>
              <th>Fiche description (*)</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($reqListArticle as $value): ?>
            <tr onclick="document.location='article.php?key=<?=$value['id']?>'" style="cursor: pointer;">
              <td><img src="../img/articles/<?=$value['id'].'/'.$value['picture']?>"
                       style="max-width:50px; max-height:50px;" /></td>
              <td><?=$value['name']?></td>
              <td><?=$value['reference']?></td>
              <td><?=$value['brand']?></td>
              <td><?=$value['category']?></td>
              <td><?= $valueIsActive[$value['isActive']] ?></td>
              <td><?php if(!empty($value['idDescription'])){ ?>
                    <!-- <a href="index.php?key="><img width="20px" src="../img/loop.gif"/></a>-->
                      Renseignée
                  <?php }else{ ?>                      
                      Non Renseignée (<?=$value['nbDescription']?>)
                  <?php } ?>
                </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <i> * nombre de fiche active, proposée pour ce produit </i>
    </div>
</div>

<?php include 'template/footer.php'; ?>
