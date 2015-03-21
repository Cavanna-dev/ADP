<?php include 'functions/connection_db.php'; ?>
<?php include 'admin/model/listCategory.php'; ?>

<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>

<div class="container">    
    <?php if (isset($_GET['erreur'])): ?>
        <br/><div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Votre article n'a pas été soumis !</h4>
            <p>Vérifier que vous avez rempli tous les champs ou que celui ci n'existe pas déja.</p>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['article'])): ?>
        <br/><div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Article créé aves succès !</h4>
            <p><a href="article.php?key=<?= $_GET['article']; ?>" data-toggle="modal" >Fiche Article</a></p>
        </div>
    <?php endif; ?>


  <form class="form-horizontal" action="model/addArticle.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="idUser" value="<?=$_SESSION['customer']['idUser']?>"/>
    <fieldset>
      <legend>Ajouter un produit</legend>
      <div class="form-group">
        <label for="inputBrand" class="col-lg-2 control-label">Marque</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="inputBrand" name="inputBrand" placeholder="Marque"
                value="<?php if (isset($_GET['brand'])){echo $_GET['brand'];}?>" >
        </div>
      </div>
      <div class="form-group">
        <label for="inputReference" class="col-lg-2 control-label">Référence</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="inputReference" name="inputReference" placeholder="Référence"
                value="<?php if (isset($_GET['reference'])){echo $_GET['reference'];}?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Nom</label>
        <div class="col-lg-8">
          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nom"
                value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputTags" class="col-lg-2 control-label">Tags</label>
        <div class="col-lg-8">
            <?php if(isset($_GET['tags'])){ $tags=$_GET['tags']; }else{$tags = '';}?>
            <textarea class="form-control" rows="3" id="inputTags" name="inputTags"><?=$tags?></textarea>
          <span class="help-block">
              La liste de TAG ne peut exceder plus de 255 caractères. Renseigner les TAGS en minuscules.
          </span>
        </div>
      </div>      

      <div class="form-group">
        <label for="idCategory" class="col-lg-2 control-label">Catégorie</label>
        <div class="col-lg-8">
          <select class="form-control" name="idCategory" id="idCategory">
            <option value=""></option>
            <?php if(isset($_GET['category'])){ $category =  $_GET['category']; }else{ $category=0; }?>
            <?php selectArrayForm($list, $listId, '', $category); ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputImg" class="col-lg-2 control-label">Image</label>
        <div class="col-lg-8">
          <input type="file" class="form-control" id="inputImg" name="inputImg"  placeholder="Image"
                value="inputImg">
        </div>
      </div>
      <br/>
      <div class="form-group">
        <div class="col-lg-8 col-lg-offset-2">
            <button type="submit" class="btn col-lg-12 btn-primary">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
    
    <div class="alert alert-dismissable alert-warning">
        <p data-dismiss="alert" >Notification : Votre produit va être soumis à la validation d'un administrateur.</p>
    </div>
</div>
<?php include 'template/footer.php'; ?>
