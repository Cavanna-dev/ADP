<?php $selectMenu = 5; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
include 'model/interface.php';
?>

<?php 
    if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 'site')){
        $classSite='active in';
        $classAdministration='';
        $classContact='';
    }elseif(!empty($_GET['page']) && $_GET['page'] == 'administration'){    
        $classSite='';
        $classAdministration='active in';
        $classContact='';
    }elseif(!empty($_GET['page']) && $_GET['page'] == 'contact'){
        $classSite='';
        $classAdministration='';
        $classContact='active in';
        
    } ?>



<div class="container">    
    <h1>Paramètres</h1>
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
    
    
<ul class="nav nav-tabs">
  <li class="<?=$classSite?>"><a href="#site" data-toggle="tab" aria-expanded="true">Site</a></li>
  <li class="<?=$classAdministration?>"><a href="#administration" data-toggle="tab" aria-expanded="false">Administration</a></li>
  <li class="<?=$classContact?>"><a href="#contact" data-toggle="tab" aria-expanded="false">Contact</a></li>
</ul>
    
<div id="myTabContent" class="tab-content">
    <div class="jumbotron tab-pane fade <?=$classSite?>" id="site">
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="nameFo" class="col-lg-3 control-label">Nom menu</label>
                <input type='hidden' name='label' value='nameFo' />
                <input type='hidden' name='page' value='site' />
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="nameFo" name="nameFo"
                           value="<?=$reqInterface['nameFo']?>">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="titleFo" class="col-lg-3 control-label">Titre onglet</label>
                <input type='hidden' name='label' value='titleFo' />
                <input type='hidden' name='page' value='site' />
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="titleFo" name="titleFo"
                           value="<?=$reqInterface['titleFo']?>">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="imgFo" class="col-lg-3 control-label">Logo</label>
                <input type='hidden' name='label' value='imgFo' />
                <input type='hidden' name='page' value='site' />
                <div class="col-lg-6">
                    <input type="file" class="form-control" id="imgFo" name="imgFo">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php" 
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="imgFavFo" class="col-lg-3 control-label">Favicon</label>
                <input type='hidden' name='label' value='imgFavFo' />
                <input type='hidden' name='page' value='site' />
                <div class="col-lg-6">
                    <input type="file" class="form-control" id="imgFavFo" name="imgFavFo">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="templateFo" class="col-lg-3 control-label">Template</label>
                <input type='hidden' name='label' value='templateFo' />
                <input type='hidden' name='page' value='site' />
                <div class="col-lg-6">
                    <select class="form-control" id="select" id="templateFo" name="templateFo">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>       
    </div>
    

    <div class="jumbotron tab-pane fade <?=$classAdministration?>" id="administration">
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="nameBo" class="col-lg-3 control-label">Nom menu</label>
                <input type='hidden' name='label' value='nameBo' />
                <input type='hidden' name='page' value='administration' />
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="nameBo" name="nameBo"
                           value="<?=$reqInterface['nameBo']?>">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="titleBo" class="col-lg-3 control-label">Titre onglet</label>
                <input type='hidden' name='label' value='titleBo' />
                <input type='hidden' name='page' value='administration' />
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="titleBo" name="titleBo"
                           value="<?=$reqInterface['titleBo']?>">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php" 
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="imgBo" class="col-lg-3 control-label">Logo</label>
                <input type='hidden' name='label' value='imgBo' />
                <input type='hidden' name='page' value='administration' />
                <div class="col-lg-6">
                    <input type="file" class="form-control" id="imgBo" name="imgBo">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php" 
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="imgFavBo" class="col-lg-3 control-label">Favicon</label>
                <input type='hidden' name='label' value='imgFavBo' />
                <input type='hidden' name='page' value='administration' />
                <div class="col-lg-6">
                    <input type="file" class="form-control" id="imgFavBo" name="imgFavBo">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="templateBo" class="col-lg-3 control-label">Template</label>
                <input type='hidden' name='label' value='templateBo' />
                <input type='hidden' name='page' value='administration' />
                <div class="col-lg-6">
                    <select class="form-control" id="select" id="templateBo" name="templateBo">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>       
    </div>
    
    <div class="jumbotron tab-pane fade <?=$classContact?>" id="contact">
       <form class="form-horizontal" method="POST" action="model/updateInterface.php">
            <div class="form-group">
                <label for="emailContact" class="col-lg-3 control-label">Adresse mail contact</label>
                <input type='hidden' name='label' value='emailContact' />
                <input type='hidden' name='page' value='contact' />
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="emailContact" name="emailContact"
                           value="<?= paramConfig('emailContact', $db)?>">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Mise à jour</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'template/footer.php'; ?>
