<?php $selectMenu = 5; ?>
<?php
include 'template/header.php';
include 'template/menu.php';

$export = CONST_MYSQL_DUMP.' '
        . '--host='.CONST_MYSQL_SERVER.' '
        . '--user='.CONST_DATABASE_USER.' '
        . '--password='.CONST_DATABASE_PWD.' '        
        . CONST_DATABASE_NAME.' '
        . '>../docs/database_'.date('d_m_Y-H_i', time()).'.sql';


system($export);


?>

<div class='container'>
    <H3>Administration</H3>
    <div class="jumbotron">
      <h1>Sauvegarde de la base de données</h1>
      <p>Nom du fichier : <?='database_'.date('d_m_Y-H_i', time()).'.sql'?></p>
      <p><a href='<?='../docs/database_'.date('d_m_Y-H_i', time()).'.sql'?>'
            class="btn btn-primary btn-lg">Télécharger</a></p>
    </div>
</div>
<?php include 'template/footer.php'; ?>