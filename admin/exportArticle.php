<?php
include 'template/header.php';
include 'model/listCategory.php';
include 'model/listArticle.php';

$nb_line = count($reqListArticle);

$data=array();

if(!empty($name)){          $data[] = array('Nom', $name); }
if(!empty($ref)){           $data[] = array('Référence', $ref); }
if(!empty($brand)){         $data[] = array('Marque', $brand);}
if(!empty($idCategory)){    $data[] = array('Catégorie', getCategorieName($db, $idCategory));}
if(!empty($isActive)){      $data[] = array('Actif', $valueIsActive[$isActive]);}
if(!empty($idDescription)):
    if($idDescription=='nr0'): 
        $data[] = array('Description', 'Sans description [0]');
    elseif(!empty($idDescription) && $idDescription=='nrX'):
        $data[] = array('Description', 'Sans description [x]'); 
    elseif(!empty($idDescription) && $idDescription=='r'):
        $data[] = array('Description', 'Liée');
    endif;    
endif;

$data[] = array('Nom','Référence','Marque','Catégorie','Actif', 'Description', 'Tags');     
 
foreach($reqListArticle as $value):
    
    if(!empty($value['description'])):
        $description = htmlspecialchars_decode($value['description']);
    else:
        $description = 'Non renseignée ('.$value['nbDescription'].')';
    endif;
    
    
    $data[] = array(
            htmlspecialchars_decode($value['name']),
            htmlspecialchars_decode($value['reference']),
            htmlspecialchars_decode($value['brand']),
            htmlspecialchars_decode($value['category']),
            $valueIsActive[$value['isActive']],
            $description,
            htmlspecialchars_decode($value['tags'])
        );
endforeach;
//var_dump($data);
//die;

$file = '/export_'.date('d-m-Y_H_i', time()).'.csv';
$folder = './tmp/'.$_SESSION['user_id'];

if(!is_dir($folder))
    mkdir($folder);

$fp = fopen($folder.$file, 'w');
foreach($data as $fields):
    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($fp, $fields, ';');
endforeach;
fclose($fp);

?>
<br />
<div class="container">
    <fieldset>
    <legend>Export des articles</legend>
    <div class="form-group">
        <div class="col-lg-12">
            <a href="<?= $folder.$file ?>" class="btn btn-primary btn-lg">Télécharger
                <span class="badge"><?=$nb_line?></span>
            </a>
        </div>
    </div>        
  </fieldset>
</div>