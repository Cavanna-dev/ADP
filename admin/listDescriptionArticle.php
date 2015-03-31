<?php $selectMenu = 2; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
include 'model/article.php';
include 'model/listDescriptionArticle.php';
?>

<div class="container">
    <h1><?=$reqArticle['name']?></h1>
        <div class="col-lg-3">
            <i>Référence : <?=$reqArticle['reference']?></i>
        </div>
        <div class="col-lg-3">
            <i>Marque : <?=$reqArticle['brand']?></i>
        </div>
        <div class="col-lg-3">
            <i>Catégorie : <?=$reqArticle['category']?></i>
        </div>
    </br></br>
    
    
    
    <div class="jumbotron">
        <form class="form-horizontal" method="GET" action="listDescriptionArticle.php">
            <div class="form-group">
                <input type="hidden" name="key" value="<?=$key?>" />
                <label for="selectIsActive" class="col-lg-1 control-label">Active</label>
                <div class="col-lg-2">
                    <select class="form-control" id="selectIsActive" name="selectIsActive">
                        <option value=""></option>
                        <option <?php if($isActive=='1') echo 'SELECTED'; ?> value='1'>Oui</option>
                        <option <?php if($isActive=='0') echo 'SELECTED'; ?> value='0'>Non</option>
                    </select>
                </div>
                <div class="col-lg-4 col-lg-offset-0">
                    <button type="submit" class="col-lg-8 btn btn-primary">Afficher</button>
                </div>
            </div>
        </form>
    </div>

    <div class="jumbotron">
        <table class="table table-striped table-hover table-responsive">
          <thead>
            <tr>
              <th>Soumis par</th>
              <th>Date</th>
              <th>Description</th>
              <th>Active</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($reqListDescription as $value): ?>
            <tr onclick="document.location='description.php?key=<?=$value['id']?>'" style="cursor: pointer;">
              <td><?=$value['user']?></td>
              <td><?=date('d/m/Y H:i', strtotime($value['dateCreate']));?></td>
              <td>
              <?php
                if(strlen($value['description'])>60):
                    echo substr($value['description'], 0, 60).' [...] ';
                else:
                    echo $value['description'];                    
                endif;              
              ?>        
              </td>
              <td><?= $valueIsActive[$value['isActive']] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    </div>
    
    <div class="jumbotron">
        <div class="form-group">
            <a href="article.php?key=<?=$reqArticle['id']?>"
               class="col-lg-2 col-lg-offset-0 btn btn-primary ">
                Fiche article
            </a>
        </div>
    </div>  
</div>

<?php include 'template/footer.php'; ?>
