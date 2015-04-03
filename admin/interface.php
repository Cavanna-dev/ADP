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
    <div class="tab-pane fade <?=$classSite?>" id="site">
    <div class="jumbotron col-lg-6">
        
        <!-- ************************ NAME FO ************************ -->
        
        <div class="form-group">
            <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                <input type='hidden' name='label' value='nameFo' />
                <input type='hidden' name='page' value='site' />
                
                <label class="control-label">Nom menu</label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           id="nameFo" name="nameFo"
                           value="<?=$reqInterface['nameFo']?>">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </span>
                </div>
            </form>
        </div>

        <!-- ************************ TITLE FO ************************ -->
        
        <div class="form-group">
            <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                <input type='hidden' name='label' value='titleFo' />
                <input type='hidden' name='page' value='site' />
                
                <label class="control-label">Titre onglet</label>
                <div class="input-group">
                    <input type="text" class="form-control"
                           id="titleFo" name="titleFo"
                           value="<?=$reqInterface['titleFo']?>">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </span>
                </div>
            </form>
        </div>

        <!-- ************************ IMG LOGO FO ************************ -->
        
        <div class="form-group">
            <form class="form-horizontal" method="POST" action="model/updateInterface.php"
                  enctype="multipart/form-data">
                <input type='hidden' name='label' value='imgFo' />
                <input type='hidden' name='page' value='site' />
                               
                <label class="control-label">Logo</label>
                <div class="input-group">
                    <input type="file" class="form-control"
                           id="imgFo" name="imgFo">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Charger</button>
                    </span>
                </div>
            </form>            
        </div>

                
        <!-- ************************ FAVICON FO ************************ -->
               
        <div class="form-group">
            <form class="form-horizontal" method="POST" action="model/updateInterface.php"
                  enctype="multipart/form-data">
                <input type='hidden' name='label' value='imgFavFo' />
                <input type='hidden' name='page' value='site' />
                
                <label class="control-label">Favicon</label>
                <div class="input-group">
                    <input type="file" class="form-control"
                           id="imgFavFo" name="imgFavFo">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Charger</button>
                    </span>
                </div>
            </form> 
        </div>
        <script type="text/javascript">
            function displayImage(img)
            {
                var image = document.getElementById('templateImg');
//                var newImage = image.option[image.selectIndex].value;                
                image.src = '../img/css/'+img.value+'.png';
            }
        </script>
        
        <!-- ************************ CSS FO ************************ -->
        
        <div class="form-group">
            <form class="form-horizontal" method="POST" action="model/updateCss.php">
                <input type='hidden' name='label' value='templateFo' />
                <input type='hidden' name='page' value='site' />
                
                <label class="control-label">Template</label>
                <div class="input-group">
                    <select class="form-control" id="templateFo" name="templateFo"
                            onchange="displayImage(this);">                        
                        <?php $table = paramConfigCssSelect('templateFo', $db);
                        foreach ($table as $value):                        
                            echo '<option value="'.$value['value'].'"';
                            if($css == $value['value'])
                                echo 'SELECTED';
                            echo '>'.$value['value'].'</option>';                        
                        endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </span>
                </div>
            </form>        
        </div>
    </div>
    <div class="jumbotron col-lg-offset-1 col-lg-5">
        <!-- **** IMG FO **** -->
        <H4>Logo</H4>
        <img 
            style="max-width:105px; max-height:105px;" 
            src='../img/imgFo/<?= paramConfig('imgFo', $db); ?>'/>
        <!-- **** IMG FAV FO **** -->
        <H4>Favicon</H4>
        <img
            style="max-width:50px; max-height:50px;" 
            src='../img/imgFavFo/<?= paramConfig('imgFavFo', $db); ?>'/>
        <!-- **** IMG CSS FO **** -->
        <H4>Template</H4>
        <img id="templateImg"
            style="max-width:300px; max-height:300px;" 
            src='../img/css/<?=$css?>.png'/>
    </div>
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
        <div class="form-group col-lg-offset-3 col-lg-9">
            <img style="max-width:100px; max-height:100px;" 
                 src='../img/imgBo/<?= paramConfig('imgBo', $db); ?>'/>
        </div> 
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
        <div class="form-group col-lg-offset-3 col-lg-9">
            <img style="max-width:25px; max-height:25px;" 
                 src='../img/imgFavBo/<?= paramConfig('imgFavBo', $db); ?>'/>
        </div> 
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
