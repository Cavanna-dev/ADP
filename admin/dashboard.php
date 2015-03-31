<?php include 'model/dashboard.php'; ?>

<h1>Dashboard</h1>

<div class="form-group col-lg-5">
    <div class="jumbotron col-lg-12">        
        <fieldset>
            <legend>Articles
                    <p onclick="document.location='listArticle.php'" style="cursor: pointer; display: inline-block">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                     
                            class="label label-default"><?= $reqDashboard['articleTotal'] ?></span>
                    </p>
            
            </legend>
            <div class="form-group">                
                <div class="col-lg-4">
                    <small>Actif</small>
                    <p onclick="document.location='listArticle.php?selectIsActive=1'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-success"><?= $reqDashboard['articleActif'] ?></span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <small>En Attente</small>
                    <p onclick="document.location='listArticle.php?selectIsActive=2'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-danger"><?= $reqDashboard['articleEnAttente'] ?></span>        
                    </p>
                </div>
                <div class="col-lg-4">
                    <small>Inactif</small>
                    <p onclick="document.location='listArticle.php?selectIsActive=0'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                      
                            class="label label-warning"><?= $reqDashboard['articleInactif'] ?></span>
                    </p>
                </div>
            </div>
        </fieldset>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" style="width: 
                 <?php 
                 if($reqDashboard['articleTotal']>0){
                     echo ($reqDashboard['articleActif']/$reqDashboard['articleTotal']*100);
                 }else{
                     echo 0;
                 }                        
                ?>%"></div>
            <div class="progress-bar progress-bar-danger" style="width: 
                <?php 
                if($reqDashboard['articleTotal']>0){
                    echo ($reqDashboard['articleEnAttente']/$reqDashboard['articleTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%"></div>
            <div class="progress-bar progress-bar-warning" style="width: 
                <?php 
                if($reqDashboard['articleTotal']>0){
                    echo ($reqDashboard['articleInactif']/$reqDashboard['articleTotal']*100) ;
                }else{
                    echo 0;
                }                        
                ?>%"></div>
        </div>
    </div>
    
    <div class="jumbotron col-lg-12"><br/>      
        <fieldset><br/> 
            <legend>Contacts</legend>
            <div class="form-group">
                <div class="col-lg-4">
                    <small>Traité</small>
                    <p onclick="document.location='listContact.php?selectStatus=2'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-success">
                                <?= $reqDashboard['contactClose'] ?>  
                        </span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <small>En Cours</small>
                    <p onclick="document.location='listContact.php?selectStatus=1'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-warning">
                               <?= $reqDashboard['contactOpen'] ?> 
                        </span>
                    </p>
                </div>
                <div class="col-lg-4">
                    <small>A traiter</small>
                    <p onclick="document.location='listContact.php?selectStatus=0'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                      
                            class="label label-danger">
                                <?= $reqDashboard['contact'] ?>
                        </span>
                    </p>
                </div>
            </div>
        </fieldset>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" style="width: 
                 <?php 
                if($reqDashboard['contactTotal']>0){
                    echo ($reqDashboard['contactClose']/$reqDashboard['contactTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%"></div>
            <div class="progress-bar progress-bar-warning" style="width: 
                <?php 
                if($reqDashboard['contactTotal']>0){
                    echo ($reqDashboard['contactOpen']/$reqDashboard['contactTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%"></div>
            <div class="progress-bar progress-bar-danger" style="width: 
                <?php 
                if($reqDashboard['contactTotal']>0){
                    echo ($reqDashboard['contact']/$reqDashboard['contactTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%"></div>
        </div>
    </div>    
</div>

<div class="form-group col-lg-7 col-lg-offset-0">
    <div class="jumbotron col-lg-12"> 
        <fieldset>
            <legend>Descriptions *</legend>
            <div class="form-group">
                <div class="col-lg-3 col-lg-offset-0">
                    <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=r'" style="cursor: pointer;">
                        <span style="font-size: 17pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                      
                            class="label label-success">
                                <?= number_format($reqDashboard['articleDescription'], 0, '.', '') ?>
                        </span>
                    </p>
                    <small>Article avec description</small>
                    
                </div>
                <div class="col-lg-4 col-lg-offset-1">                    
                    <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=nrX'" style="cursor: pointer;">
                        <span style="font-size: 17pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-warning">
                                <?= $reqDashboard['articleDescriptionDispo'] ?>
                        </span>
                    </p>
                    <small>Article sans description, description disponible</small>
                </div>
                <div class="col-lg-4 col-lg-offset-0" >
                   
                    <p onclick="document.location='listArticle.php?selectIsActive=3&selectIdDescription=nr0'" style="cursor: pointer;">
                        <span style="font-size: 17pt;"
                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                      
                            class="label label-danger">
                              <?= $reqDashboard['articleDescriptionNoDispo'] ?>  
                        </span>
                    </p>
                     <small>Article sans description disponible</small>
                </div>            
            </div>
        </fieldset>    
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" style="width: 
                <?php 
                if(($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])>0){
                    echo ($reqDashboard['articleDescription']/($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])*100);
                }else{
                    echo 0;
                }                        
                ?>%">
            </div>
            <div class="progress-bar progress-bar-warning" style="width: 
                <?php 
                if(($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])>0){
                    echo ($reqDashboard['articleDescriptionDispo']/($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])*100);
                }else{
                    echo 0;
                }                        
                ?>%">
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 
                <?php 
                if(($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])>0){
                    echo ($reqDashboard['articleDescriptionNoDispo']/($reqDashboard['articleActif']+$reqDashboard['articleEnAttente'])*100);
                }else{
                    echo 0;
                }                        
                ?>%">
            </div>
        </div>

        <i>* Sur les articles actifs et en attentes</i>
    </div>



    <div class="jumbotron col-lg-5 col-lg-offset-0"> 
        <fieldset>
            <legend>Utilisateurs                
                <p onclick="document.location='listUser.php'" style="cursor: pointer; display: inline-block">
                    <span style="font-size: 16pt;"
                        onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                    
                        class="label label-default"><?= $reqDashboard['customerTotal'] ?></span>
                </p>            
            </legend>
            <div class="form-group">
                <div class="col-lg-6">
                    <small>Actif</small>
                    <p onclick="document.location='listUser.php?selectIsActive=1'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                                            onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                            onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                    
                            class="label label-success">
                            <?= $reqDashboard['customerActif'] ?>
                        </span>
                    </p>
                </div>
                <div class="col-lg-6">
                    <small>Inactif</small>
                    <p onclick="document.location='listUser.php?selectIsActive=0'" style="cursor: pointer;">
                        <span style="font-size: 16pt;"
                                        onmouseover="this.style.fontSize='18pt';this.style.borderRadius='1em';"
                                        onmouseout="this.style.fontSize='16pt';this.style.borderRadius='0.2em';"                       
                            class="label label-danger">
                            <?= $reqDashboard['customerInactif'] ?>
                        </span>
                    </p>
                </div>
            </div>
        </fieldset>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success" style="width: 
                <?php 
                if($reqDashboard['customerTotal']>0){
                    echo ($reqDashboard['customerActif']/$reqDashboard['customerTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%">
            </div>
            <div class="progress-bar progress-bar-danger" style="width: 
                <?php 
                if($reqDashboard['customerTotal']>0){
                    echo ($reqDashboard['customerInactif']/$reqDashboard['customerTotal']*100);
                }else{
                    echo 0;
                }                        
                ?>%">
            </div>
        </div>
    </div>
    <div class="jumbotron col-lg-6 col-lg-offset-1"> 
        <fieldset>
            <legend>Ventes day-1</legend>
            <p>
                <span style="font-size: 30pt;"                      
                    class="label label-primary"><?= $reqDashboard['customerTotal'] ?></span>
            </p>
    </div>
</div>

