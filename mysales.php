<?php include 'template/header.php'; ?>
<?php include 'template/menu.php'; ?>
<?php include './functions/connection_db.php'; ?>
<?php include 'model/bootstrap.php'; ?>

<script>
    $(document).ready(function() {
        $("#show-up").slideDown('slow').delay(2000).slideUp('slow');
    });
</script>

<div class="container">    
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-dismissible alert-success" id="show-up" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Votre vente a été crée.
        </div>
    <?php } else if (isset($_GET['error'])) { ?>
        <div class="alert alert-dismissible alert-warning" id="show-up" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Il y a eut un problème avec la création, veuillez réessayer plus tard.
        </div>
    <?php } ?>
    <h1>Liste des ventes</h1> 
    <br /><br />
    <?php $r_sales = getSalesByUser($db, $_SESSION['customer']['idUser']); ?>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r_sale = $r_sales->fetch(PDO::FETCH_OBJ)) { ?>
                <tr class="<?php 
                if($r_sale)
                ?>">
                    <td><?= $r_sale->reference ?></td>
                    <td><?= $r_sale->name ?></td>
                    <td><?= $r_sale->price ?></td>
                    <td><?= $r_sale->description ?></td>
                    <td>
                        <a href="#" onclick="return confirm('La suppression de cette vente entrainera la disparition définitive des données liées à cette vente.')">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'template/footer.php'; ?>
