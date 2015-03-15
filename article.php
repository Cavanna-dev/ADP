<?php
/**
 * Created by PhpStorm.
 * User: Aurelien
 * Date: 13/03/15
 * Time: 12:46
 */

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
                <p>Description</p>
                <h4><?=$reqArticle['name']?></h4>
            </blockquote>
        </div>
         
         <div class="col-lg-6">
            <blockquote>
                <p>Tags associés</p>
                <h4><?=$reqArticle['name']?></h4>
            </blockquote>
        </div>
    </div>    
</div>

<?php include 'template/footer.php'; ?>