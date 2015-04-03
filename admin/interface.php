<?php $selectMenu = 5; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
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
                               value="<?= paramConfig('nameFo', $db)?>">
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
                               value="<?= paramConfig('titleFo', $db)?>">
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

            <!-- ************************ CSS FO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateCss.php">
                    <input type='hidden' name='label' value='templateFo' />
                    <input type='hidden' name='page' value='site' />

                    <label class="control-label">Template</label>
                    <div class="input-group">
                        <select class="form-control" id="templateFo" name="templateFo"
                                onchange="displayImage(this, 'templateImgFo');">                        
                            <?php $table = paramConfigCssSelect('templateFo', $db);
                            foreach ($table as $value):                        
                                echo '<option value="'.$value['value'].'"';
                                if(paramConfigCss('templateFo', $db) == $value['value'])
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
            <img id="templateImgFo"
                style="max-width:300px; max-height:300px;" 
                src='../img/css/<?= paramConfigCss('templateFo', $db); ?>.png'/>
        </div>
    </div>
    

    <div class="tab-pane fade <?=$classAdministration?>" id="administration">
        <div class="jumbotron col-lg-6">

            <!-- ************************ NAME BO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                    <input type='hidden' name='label' value='nameBo' />
                    <input type='hidden' name='page' value='administration' />

                    <label class="control-label">Nom menu</label>
                    <div class="input-group">
                        <input type="text" class="form-control"
                               id="nameBo" name="nameBo"
                               value="<?= paramConfig('nameBo', $db)?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </span>
                    </div>
                </form>
            </div>

            <!-- ************************ TITLE BO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                    <input type='hidden' name='label' value='titleBo' />
                    <input type='hidden' name='page' value='administration' />

                    <label class="control-label">Titre onglet</label>
                    <div class="input-group">
                        <input type="text" class="form-control"
                               id="titleBo" name="titleBo"
                               value="<?= paramConfig('titleBo', $db)?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </span>
                    </div>
                </form>
            </div>

            <!-- ************************ IMG LOGO BO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php"
                      enctype="multipart/form-data">
                    <input type='hidden' name='label' value='imgBo' />
                    <input type='hidden' name='page' value='administration' />

                    <label class="control-label">Logo</label>
                    <div class="input-group">
                        <input type="file" class="form-control"
                               id="imgBo" name="imgBo">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Charger</button>
                        </span>
                    </div>
                </form>            
            </div>


            <!-- ************************ FAVICON BO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php"
                      enctype="multipart/form-data">
                    <input type='hidden' name='label' value='imgFavBo' />
                    <input type='hidden' name='page' value='administration' />

                    <label class="control-label">Favicon</label>
                    <div class="input-group">
                        <input type="file" class="form-control"
                               id="imgFavBo" name="imgFavBo">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Charger</button>
                        </span>
                    </div>
                </form> 
            </div>

            <!-- ************************ CSS BO ************************ -->

            <div class="form-group">
                <form class="form-horizontal" name="bo" method="POST" action="model/updateCss.php">
                    <input type='hidden' name='label' value='templateBo' />
                    <input type='hidden' name='page' value='administration' />

                    <label class="control-label">Template</label>
                    <div class="input-group">
                        <select class="form-control" id="templateBo" name="templateBo"
                                onchange="displayImage(this, 'templateImgBo');">                        
                            <?php $table = paramConfigCssSelect('templateBo', $db);
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
                src='../img/imgBo/<?= paramConfig('imgBo', $db); ?>'/>
            <!-- **** IMG FAV FO **** -->
            <H4>Favicon</H4>
            <img
                style="max-width:50px; max-height:50px;" 
                src='../img/imgFavBo/<?= paramConfig('imgFavBo', $db); ?>'/>
            <!-- **** IMG CSS FO **** -->
            <H4>Template</H4>
            <img id="templateImgBo"
                style="max-width:300px; max-height:300px;" 
                src='../img/css/<?=$css?>.png'/>
        </div>
    </div>
    
    <div class="tab-pane fade <?=$classContact?>" id="contact">
        <div class="jumbotron">
            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                    <input type='hidden' name='label' value='emailContact' />
                    <input type='hidden' name='page' value='contact' />

                    <label class="control-label">Adresse mail contact</label>
                    <div class="input-group">
                        <input type="text" class="form-control"
                               id="emailContact" name="emailContact"
                               value="<?= paramConfig('emailContact', $db)?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="form-group">
                <form class="form-horizontal" method="POST" action="model/updateInterface.php">
                    <input type='hidden' name='label' value='emailSend' />
                    <input type='hidden' name='page' value='contact' />

                    <label class="control-label">Adresse mail d'envoie</label>
                    <div class="input-group">
                        <input type="text" class="form-control"
                               id="emailSend" name="emailSend"
                               value="<?= paramConfig('emailSend', $db)?>">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function displayImage(img, div)
    {
        var image = document.getElementById(div);            
        image.src = '../img/css/'+img.value+'.png';
    }
</script>
<?php include 'template/footer.php'; ?>
