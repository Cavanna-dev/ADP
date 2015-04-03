<?php $selectMenu = 6; 
include 'template/header.php';
include 'template/menu.php';
include 'model/contact.php';
?>


<div class="container">
    <h1>Information</h1>   
    <div class="form-group">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <blockquote>
                    <p>Nom, Prénom</p>
                    <h3><?=$reqContact['nameCustomer'].', '.$reqContact['firstNameCustomer']?></h3>               
                </blockquote>
            </div>
            <div class="col-lg-4">
                <blockquote>
                    <p>Date demande</p>
                    <h3><?= date('d/m/Y H:i', strtotime($reqContact['dateCreate'])) ?></h3>            
                </blockquote>
            </div>            
            <div class="col-lg-4">
                <blockquote>
                    <p>Statut</p>
                    <h3><?=$valueStatus[$reqContact['status']]?></h3>
                </blockquote>
            </div>    
            <?php if($reqContact['status']>0): ?>                
                <div class="col-lg-4">
                    <blockquote>
                        <p>Administrateur Nom, Prénom</p>
                        <h3><?=$reqContact['nameUser']?></h3>               
                    </blockquote>
                </div>
                <div class="col-lg-4">
                    <blockquote>
                        <p>Date traitement</p>
                        <h3><?= date('d/m/Y H:i', strtotime($reqContact['dateChange'])) ?></h3>            
                    </blockquote>
                </div>               
            <?php endif; ?>
            <div class="col-lg-12">
                <blockquote>
                    <p>Sujet</p>
                    <h3><?=$reqContact['subject']?></h3>
                </blockquote>
            </div>
            <?php if($reqContact['status']<2): ?>
                <div class="col-lg-4">
                    <blockquote>
                        <p>Statut suivant</p>
                        <form method="POST" action="model/updateContact.php" name="<?=$reqContact['id']?>">                    
                            <input type="hidden" name="idAdminUser" value="<?=$_SESSION['user_id']?>" />
                            <input type="hidden" name="id" value="<?=$reqContact['id']?>" />  
                            <?php if($reqContact['status']==0): ?>
                                <input type="hidden" name="status" value="1" />
                                <td class="col-lg-2">
                                    <button type="submit" class="col-lg-12 btn btn-warning">En cours</button>
                                </td>
                            <?php elseif($reqContact['status']==1): ?>
                                <input type="hidden" name="status" value="2" />
                                <td col-lg-2>
                                    <button type="submit" class="col-lg-12 btn btn-success">Terminé</button>
                                </td>
                            <?php endif; ?>
                            </form>
                    </blockquote>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>