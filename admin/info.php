<?php 
    include 'template/header.php';
    include 'model/info.php';
    $roleValue[0] = 'Administrateur';
    $roleValue[1] = 'Super Admin';    
    
    include 'template/menu.php';
?>


<div class="container">
    <h1>Information</h1>   
    
    <div class="form-group">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <blockquote>
                    <p>Nom</p>
                    <h3><?=$reqUser['name']?></h3>               
                </blockquote>
            </div>
            <div class="col-lg-4">
                <blockquote>
                    <p>Prénom</p>
                    <h3><?=$reqUser['firstName']?></h3>
                </blockquote>
            </div>
            <div class="col-lg-4">
                <blockquote>
                    <p>Email</p>
                    <h3><?=$reqUser['email']?></h3>
                </blockquote>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-4">
                <blockquote>
                    <p>Role</p>
                    <h3><?=$roleValue[$reqUser['role']]?></h3>               
                </blockquote>
            </div>
            <div class="col-lg-4">
                <blockquote>
                    <p>Date création</p>
                    <h3><?= date('d/m/Y H:i', strtotime($reqUser['dateCreate'])) ?></h3>
                </blockquote>
            </div>
        </div>
    </div>
    
    <h2>Mot de passe</h2>
    <div class="jumbotron">
        <?php  if(isset($_GET['success'])):  ?>                        
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Tâche effectuée avec succès.</strong> 
            </div>                        
        <?php  endif;   ?>
        <form class="form-horizontal" method="POST" action="model/updatePassword.php" >
            <input type="hidden" name="key" value="<?= $key ?>"/>
            <div class="form-group">
                <label for="inputUpdatePassword" class="col-lg-4 control-label">Nouveau mot de passe</label>
                <div class="col-lg-3">
                    <input type="password" class="form-control" id="inputUpdatePassword" name="inputUpdatePassword"/>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="col-lg-12 btn btn-primary">Modifier</button>
                </div>
            </div>
        </form>
    </div>
    
    
</div>

<?php include 'template/footer.php'; ?>