<?php $selectMenu = 6; ?>
<?php
include_once '../functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';

include 'model/listContact.php';

$valueStatus[0] = 'A traiter';
$valueStatus[1] = 'En cours';
$valueStatus[2] = 'Terminé';
?>


<div class="container">
    <h1>Adminsitration Contact</h1>

    <div class="jumbotron">
        <form class="form-horizontal" method="GET" action="listContact.php">
            <fieldset>                
                <div class="form-group">
                    <label for="selectStatus" class="col-lg-1 control-label">Statut</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="selectStatus" name="selectStatus">
                            <option value=""></option>
                            <option <?php if($status=='0') echo 'SELECTED'; ?> value="0"><?=$valueStatus[0]?></option>
                            <option <?php if($status=='1') echo 'SELECTED'; ?> value="1"><?=$valueStatus[1]?></option>
                            <option <?php if($status=='2') echo 'SELECTED'; ?> value="2"><?=$valueStatus[2]?></option>
                        </select>
                    </div>
                    <div class="checkbox col-lg-3">                 
                        <label>
                            <input type="checkbox"
                                <?php if($myFile=='on'){ echo 'checked'; } ?>
                                   name="myFile" id="myFile" ><b>Mes dossiers</b>
                        </label>
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
              <th>Sujet</th>
              <th>Date demande</th>
              <th>Statut</th>
              <th>Date traitement</th>
              <th>Traité par</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($reqListContact as $value): ?>
            <tr onclick="document.location='contact.php?key=<?=$value['id']?>'" style="cursor: pointer;">                
                <td class="col-lg-2"><?=$value['nameCustomer'].', '.$value['firstNameCustomer']?></td>
                <td class="col-lg-3"><?=$value['subject']?></td>
                <td class="col-lg-2"><?=date('d/m/Y', strtotime($value['dateCreate']))?></td>                
                <td class="col-lg-1"><?=$valueStatus[$value['status']]?></td>         
                <td class="col-lg-2"><?=date('d/m/Y', strtotime($value['dateChange']))?></td>
                <td class="col-lg-2"><?=$value['nameUser']?></td>         
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
    </div>

<?php include 'template/footer.php'; ?>