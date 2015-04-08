<?php $selectMenu = 6; 
include 'template/header.php';
include 'template/menu.php';
include 'model/contact.php';
?>


<div class="container">
    <h1>Information</h1>    
    <div class="jumbotron col-lg-12">
        <div class='col-lg-3'>
            <small>Nom & Prénom</small>
            <h3><?=$reqContact['nameCustomer'].', '.$reqContact['firstNameCustomer']?></h3>
        </div>
        <div class='col-lg-3'>
            <small>Date de demande</small>
            <h3><?= date('d/m/Y H:i', strtotime($reqContact['dateCreate'])) ?></h3>
        </div>
        <div class='col-lg-4'>
            <small>Sujet</small>
            <h3><?=$reqContact['subject']?></h3>
        </div>
        <div class='col-lg-2'>
            <small>Statut</small>
            <h3><?=$valueStatus[$reqContact['status']]?></h3>
        </div>     
    </div>
    <?php $class='';?>
    <?php if($reqContact['status']>0): ?>
        <?php $class='col-lg-offset-1';?>
        <h1>Statut</h1> 
        <div class="jumbotron col-lg-8">
            <div class="col-lg-6">
                <p>Administrateur</p>
                <h2><?=$reqContact['nameUser']?></h2>
            </div>
            <div class="col-lg-6">
                <p>Date de traitement</p>
                <h2><?= date('d/m/Y H:i', strtotime($reqContact['dateChange'])) ?></h2>
            </div>     
        </div>
    <?php endif; ?>    
   
    <?php if($reqContact['status']<2): ?>
        <div class="jumbotron col-lg-3 <?=$class?>">
            <p>Etape suivante</p>
            <form method="POST" action="model/updateContact.php" name="<?=$reqContact['id']?>">                    
                <input type="hidden" name="idAdminUser" value="<?=$_SESSION['user_id']?>" />
                <input type="hidden" name="id" value="<?=$reqContact['id']?>" />  
                <?php if($reqContact['status']==0): ?>
                    <input type="hidden" name="status" value="1" />
                    <button type="submit" class="col-lg-12 btn btn-warning">En cours</button>
                <?php elseif($reqContact['status']==1): ?>
                    <input type="hidden" name="status" value="2" />
                    <button type="submit" class="col-lg-12 btn btn-success">Terminé</button>
                <?php endif; ?>
                </form>
        </div>
    <?php endif; ?>
</div>

<?php include 'template/footer.php'; ?>