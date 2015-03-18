<?php
include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';
include 'model/listUser.php';
?>


<div class="container">
    <h1>Liste des utilisateurs du site</h1>

    <div class="jumbotron">
        <form class="form-horizontal" method="GET" action="listUser.php">
            <fieldset>                
                <div class="form-group">
                    <label for="inputName" class="col-lg-1 control-label">Nom</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="inputName" name="inputName" value="<?=$name?>">
                    </div>
                    <label for="selectIsActive" class="col-lg-1 control-label">Active</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="selectIsActive" name="selectIsActive">
                            <option value=""></option>
                            <option <?php if($isActive=='1') echo 'SELECTED'; ?> value="1">Oui</option>
                            <option <?php if($isActive=='0') echo 'SELECTED'; ?> value="0">Non</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
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
              <th>Nom, Prénom</th>
              <th>Email</th>
              <th>Inscription</th>
              <th>Ville</th>
              <th>Articles créés</th>
              <th>Descriptions créées</th>
              <th>Articles vendus</th>
              <th>Articles achetés</th>
              <th>Actif</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($reqListCustomer as $value): ?>
            <tr>                
                <td class="col-lg-2"><?=$value['name'].', '.$value['firstName']?></td>
                <td><?=$value['email']?></td>
                <td><?=date('d/m/Y', strtotime($value['dateCreate']))?></td>
                <td><?=$value['town']?></td>
                <td align="right"><?=$value['articleCreate']?></td>
                <td align="right"><?=$value['descriptionCreate']?></td>
                <td align="right"><?=$value['articleSales']?></td>
                <td align="right"><?=$value['articleBuy']?></td>
                <form method="POST" action="model/updateCustomer.php" name="<?=$value['id']?>">                    
                    <input type="hidden" name="idUser" value="<?=$value['id']?>" />                    
                    <?php if($value['isActive']==1): ?>
                        <input type="hidden" name="isActive" value="0" />
                        <td><button type="submit" class="col-lg-12 btn btn-danger">Désactiver</button></td>
                    <?php else: ?>
                        <input type="hidden" name="isActive" value="1" />
                        <td><button type="submit" class="col-lg-12 btn btn-success">Activer</button></td>
                    <?php endif; ?>
                </form>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    </div>
</div>

<?php include 'template/footer.php'; ?>
