<?php ob_start() ?>

<form action="<?=URL?>prestaRegard/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaRegard_nom" class="form-label">Intitulé de la prestation Regard</label>
        <input type="text" class="form-control" id="prestaRegard_nom" name="prestaRegard_nom" value="<?=$regard->getPrestaRegard_nom()?>">
    </div>
   
    <div class="mb-3">
        <label for="prestaRegard_descr" class="form-label">Description de la prestation Regard</label>
        <input type="text" class="form-control" id="prestaRegard_descr" name="prestaRegard_descr" value="<?=$regard->getprestaRegard_descr()?>">
    </div>

    <div class="mb-3">
        <label for="prestaRegard_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaRegard_prix" name="prestaRegard_prix" value="<?=$regard->getPrestaRegard_prix()?>">
    </div>

    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$regard->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id_prestaRegard" value="<?=$regard->getId_prestaRegard()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modification de la prestation : ".$regard->getPrestaRegard_nom();
$content = ob_get_clean();
require_once "views/template.php";
