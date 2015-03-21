<?php
include_once 'functions/connection_db.php';

include 'template/header.php';
include 'template/menu.php';
include 'model/article.php';
?>


<div class="container">
    <h1>Information article</h1>        
    </br>
    <div class="form-group">
        <div class="col-lg-6">
            <img src="img/articles/<?=$reqArticle['id'].'/'.$reqArticle['picture']?>"
                 style="max-width:550px; max-height:350px;" />
        </div>
    </div>  
                
        
    <div class="form-group">
        <div class="col-lg-6">
            <blockquote>
                <p>Nom</p>
                <h3><?=$reqArticle['name']?></h3>               
            </blockquote>

            <blockquote>
                <p>Référence</p>
                <h3><?=$reqArticle['reference']?></h3>
            </blockquote>

            <blockquote>
                <p>Marque</p>
                <h3><?=$reqArticle['brand']?></h3>
            </blockquote>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-6">
            <blockquote>
                <p>Catégorie</p>
                <h3><?=$reqArticle['category']?></h3>
            </blockquote>
        </div>    
       <div class="col-lg-6">
            <blockquote>
                <p>Tags associés</p>
                <h3><?=$reqArticle['tags']?></h3>
            </blockquote>
        </div>
    </div>       

    
    <div class="form-group">
        <div class="col-lg-6">
            <blockquote>
                <p>Description</p>
                <h4>
                    <?php 
                    if(empty($reqArticle['description'])==FALSE):
                        echo $reqArticle['description'];                        
                    elseif(!isset($_GET['addDescription']) && !isset($_GET['descriptionSucces'])):
                        ?><i>Aucune description</i><br/><br/>
                        <a href="article.php?key=<?=$reqArticle['id']?>&addDescription">
                            Soumettre une description
                        </a><?php
                    elseif(isset($_GET['addDescription'])): ?>
                        <form class="form-horizontal" method="POST" action="model/addDescription.php" >
                            <input type="hidden" name="idUser" value="<?=$_SESSION['customer']['idUser']?>"/>
                            <input type="hidden" name="idArticle" value="<?=$reqArticle['id']?>"/>
                            <div class="form-group">
                              <label for="description" class="col-lg-0 control-label"></label>
                              <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                                <span class="help-block">Votre description ne peut exceder plus de 510 caractères. Au-delà, elle sera tronquée.</span>
                              </div>
                            </div>                             

                            <div class="form-group">
                              <div class="col-lg-10 col-lg-offset-0">
                                <button type="submit" class="btn btn-primary">Soumettre</button>
                              </div>
                            </div>
                        </form>
                    <?php
                    elseif(isset($_GET['descriptionSucces'])):
                    ?>                        
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Description soumise.</strong> 
                            <br/>Merci pour votre contribution.
                        </div>                        
                    <?php
                    endif;                       
                    ?>
                </h4>
            </blockquote>
        </div>
    </div>
</div>       


<?php include 'template/footer.php'; ?>