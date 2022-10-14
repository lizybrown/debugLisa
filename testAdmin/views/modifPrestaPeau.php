<?php ob_start() ?>

<form action="<?=URL?>prestaPeau/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaPeau_nom" class="form-label">Intitulé de la prestation Peau</label>
        <input type="text" class="form-control" id="prestaPeau_nom" name="prestaPeau_nom" value="<?=$peau->getPrestaPeau_nom()?>">
    </div>
   
    <div class="mb-3">
        <label for="prestaPeau_descr" class="form-label">Description de la prestation Peaut</label>
        <input type="text" class="form-control" id="prestaPeau_descr" name="prestaPeau_descr" value="<?=$peau->getPrestaPeau_descr()?>">
    </div>

    <div class="mb-3">
        <label for="prestaPeau_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaPeau_prix" name="prestaPeau_prix" value="<?=$peau->getPrestaPeau_prix()?>">
    </div>

    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$peau->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id_prestaPeau" value="<?=$peau->getId_prestaPeau()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modification de la prestation : ".$peau->getPrestaPeau_nom();
$content = ob_get_clean();
require_once "views/template.php";
