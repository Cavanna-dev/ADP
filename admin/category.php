<?php $selectMenu = 2; ?>
<?php
include 'template/header.php';
include 'template/menu.php';
include 'model/listCategory.php';
include 'model/listCategoryInactive.php';

?>

<div class="container">
    <h1>Gestion des catégories</h1>

    <?php if (isset($_GET['erreur'])) { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Une erreur s'est produite !</h4>
            <p>Veuillez réssayer.</p>
        </div>
    <?php } ?>
    <?php if (isset($_GET['category'])) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Catégorie créée aves succès !</h4>
        </div>
    <?php } ?>
    <?php if (isset($_GET['categoryUpdate'])) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Catégorie modifiée aves succès !</h4>
        </div>
    <?php } ?>
    
    
<?php 
    if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 'add')){
        $classAdd='active in';
        $classActif='';
        $classInActif='';
    }elseif(!empty($_GET['page']) && $_GET['page'] == 'actif'){    
        $classAdd='';
        $classActif='active in';
        $classInActif='';
    }elseif(!empty($_GET['page']) && $_GET['page'] == 'inactif'){    
        $classAdd='';
        $classActif='';
        $classInActif='active in';
    }
?>

<ul class="nav nav-tabs">
  <li class="<?=$classAdd?>"><a href="#add" data-toggle="tab" aria-expanded="true">Ajouter</a></li>
  <li class="<?=$classActif?>"><a href="#actif" data-toggle="tab" aria-expanded="false">Active</a></li>
  <li class="<?=$classInActif?>"><a href="#inactif" data-toggle="tab" aria-expanded="false">Inactive</a></li>
</ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade <?=$classAdd?>" id="add">
            <div class="jumbotron col-lg-12">
                <form class="form-horizontal" action="model/addCategory.php" method="POST">
                    <input type="hidden" name="page" value="add"/>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Nom</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="idParent" class="col-lg-2 control-label">Catégorie parent</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="idParent" id="idParent">
                                <option value="0"></option>
                                <?php
                                selectArray($list, $listId, '', 0);
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="idAdminUser" value="<?php echo $_SESSION['user_id'];?>"/>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
        <div class="tab-pane fade <?=$classActif?>" id="actif">
            <div class="jumbotron col-lg-12">
               <form class="form-horizontal" name="active" action="model/updateCategory.php" method="POST">
                   <input type="hidden" name="page" value="actif"/>
                    <div class="form-group">
                        <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="idCategory" id="idCategory">
                                <option value="0"></option>
                                <?php
                                selectArray($list, $listId, '', 0);
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="valueIsActive" value="0"/>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Désactiver</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        
        <div class="tab-pane fade <?=$classInActif?>" id="inactif">
            <div class="jumbotron col-lg-12">
                <form class="form-horizontal" name="noActive" action="model/updateCategory.php" method="POST">
                    <input type="hidden" name="page" value="inactif"/>
                    <div class="form-group">
                        <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="idCategory" id="idCategory">
                                <option><i>[Nom parent] Nom catégorie (nombre d'enfant)</i></option>
                                <?php foreach($reqInactive as $value): ?>
                                    <option value="<?= $value['id']?>">
                                        <?php if($value['nameParent']!='')
                                            echo '[' . $value['nameParent'] . ']&nbsp&nbsp' ;
                                        echo $value['name'].'&nbsp&nbsp('.$value['nbChild'].')' ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="valueIsActive" value="1"/>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Activer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>
<?php include 'template/footer.php'; ?>
