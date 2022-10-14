<?php ob_start() ?>

<form action="<?=URL?>prestaLevre/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaLevre_nom" class="form-label">Intitulé de la prestation </label>
        <input type="text" class="form-control" id="prestaLevre_nom" name="prestaLevre_nom" value="<?=$levre->getPrestaLevre_nom()?>">
    </div>
   
    <div class="mb-3">
        <label for="prestaLevre_descr" class="form-label">Description de la prestation</label>
        <input type="text" class="form-control" id="prestaLevre_descr" name="prestaLevre_descr" value="<?=$levre->getPrestaLevre_descr()?>">
    </div>

    <div class="mb-3">
        <label for="prestaLevre_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaLevre_prix" name="prestaLevre_prix" value="<?=$levre->getPrestaLevre_prix()?>">
    </div>

    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$levre->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>

    <input type="hidden" id="id_prestaLevre" name="id_prestaLevre" value="<?=$levre->getId_PrestaLevre()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modification de la prestation : ".$levre->getPrestaLevre_nom();
$content = ob_get_clean();
require_once "views/template.php";
