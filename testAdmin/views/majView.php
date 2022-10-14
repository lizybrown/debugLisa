<?php 
ob_start();
?>

 <?php
//  var_dump($_SESSION);
?>
<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>intitulé de la prestation</th>
        <th>prix</th>
        <th>descriptif</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach($peaux as $peau) {
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$peau->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>prestaPeau/consulter/<?=$peau->getId_prestaPeau()?>"><?= $peau->getprestaPeau_nom() ?></a></td>
        <td class="align-middle"><?= $peau->getprestaPeau_prix() ?></td>
        <td class="align-middle"><?= $peau->getprestaPeau_descr() ?></td>
 
        
        <td class="align-middle"><a href="<?=URL?>prestaPeau/modifier/<?=$peau->getId_prestaPeau()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>prestaPeau/supprimer/<?=$peau->getId_prestaPeau()?>"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>prestaPeau/ajouter" class="btn btn-success d-block">Ajouter</a>
<br>
<br>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>intitulé de la prestation</th>
        <th>prix</th>
        <th>descriptif</th>
        <th colspan="2">Actions</th>
    </tr>
   
    <?php
    foreach($levres as $levre) {
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$levre->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>prestaLevre/consulter/<?=$levre->getId_PrestaLevre()?>"><?= $levre->getPrestaLevre_nom() ?></a></td>
        <td class="align-middle"><?= $levre->getPrestaLevre_prix() ?></td>
        <td class="align-middle"><?= $levre->getPrestaLevre_descr() ?></td>
 
        
        <td class="align-middle"><a href="<?=URL?>prestaLevre/modifier/<?=$levre->getId_PrestaLevre()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>prestaLevre/supprimer/<?=$levre->getId_PrestaLevre()?>"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>prestaLevre/ajouter" class="btn btn-success d-block">Ajouter</a>

<br>
<br>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>intitulé de la prestation</th>
        <th>prix</th>
        <th>descriptif</th>
        <th colspan="2">Actions</th>
    </tr>
   
    <?php
    foreach($regards as $regard) {
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$regard->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>prestaRegard/consulter/<?=$regard->getId_PrestaRegard()?>"><?= $regard->getPrestaRegard_nom() ?></a></td>
        <td class="align-middle"><?= $regard->getPrestaRegard_prix() ?></td>
        <td class="align-middle"><?= $regard->getPrestaRegard_descr() ?></td>
 
        
        <td class="align-middle"><a href="<?=URL?>prestaRegard/modifier/<?=$regard->getId_PrestaRegard()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>prestaRegard/supprimer/<?=$regard->getId_PrestaRegard()?>"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>prestaRegard/ajouter" class="btn btn-success d-block">Ajouter</a>


<br>
<br>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>intitulé de la formation</th>
        <th>prix</th>
        <th>descriptif</th>
        <th>contenu de la formation</th>
        <th>quantité</th>
        <th colspan="2">Actions</th>
    </tr>
   
    <?php
    foreach($formations as $formation) {
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$formation->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>formations/consulter/<?=$formation->getId_forma()?>"><?= $formation->getForma_nom() ?></a></td>
        <td class="align-middle"><?= $formation->getForma_prix() ?></td>
        <td class="align-middle"><?= $formation->getForma_descr() ?></td>
        <td class="align-middle"><?= $formation->getContent() ?></td>
        <td class="align-middle"><?= $formation->getQuantity() ?></td>
        
        <td class="align-middle"><a href="<?=URL?>formations/modifier/<?=$formation->getId_forma()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>formations/supprimer/<?=$formation->getId_forma()?>"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>formations/ajouter" class="btn btn-success d-block">Ajouter</a>
<?php
            // }
            ?>

<?php
$titre = "Liste des formations et des prestations";
$content = ob_get_clean();
require_once "views/template.php";