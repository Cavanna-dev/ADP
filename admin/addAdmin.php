<?php $selectMenu = 4;
include 'template/header.php';
include 'template/menu.php'; 
?>

<div class="container">  
    <h1>Créer compte administrateur</h1> 

    <?php if (isset($_GET['erreur'])): ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>Le compte n'a pas pu être créé !</h4>
        </div>
    <?php endif; ?>

    
    <form class="form-horizontal" action="model/addAdmin.php" method="POST">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th><label for="inputEmail" class="control-label">Email</label></th>
                <th><label for="inputPassword" class=" control-label">Mot de passe</label></th>
                <th><label for="name" class="control-label">Nom</label></th>
                <th><label for="firstName" class="control-label">Prénom</label></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr class="active" >
                    <td style="vertical-align:middle;">
                        <input type="text" name="inputEmail" id="inputEmail" value="<?php if (isset($_GET['inputEmail'])){echo $_GET['inputEmail'];}?>"/>
                    </td>
                    <td style="vertical-align:middle;">
                        <input type="inputPassword" name="inputPassword" id="password"></td>
                    <td style="vertical-align:middle;">
                        <input type="text" name="name" id="name" value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>"/>
                    </td>
                    <td style="vertical-align:middle;">
                        <input type="text" name="firstName" id="firstName" value="<?php if (isset($_GET['firstName'])){echo $_GET['firstName'];}?>"/>
                    </td>
                    <td style='padding:0;'>
                        <button type="submit" style="border-radius:0;"
                            class="col-lg-12 btn btn-primary">Sauvegarder</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?php include 'template/footer.php'; ?>
