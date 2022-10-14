<?php ob_start() ?>

<form action="<?=URL?>formations/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="forma_nom" class="form-label">Intitulé de la formation</label>
        <input type="text" class="form-control" id="forma_nom" name="forma_nom" value="<?=$formation->getForma_nom()?>">
    </div>
   
    <div class="mb-3">
        <label for="forma_descr" class="form-label">Description de la formation</label>
        <input type="text" class="form-control" id="forma_descr" name="forma_descr" value="<?=$formation->getForma_descr()?>">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenu de la formation</label>
        <input type="text" class="form-control" id="content" name="content" value="<?=$formation->getForma_descr()?>">
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Nombre de places</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?=$formation->getQuantity()?>">
    </div>

    <div class="mb-3">
        <label for="forma_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="forma_prix" name="forma_prix" value="<?=$formation->getForma_prix()?>">
    </div>

    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$formation->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id" value="<?=$formation->id_forma()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modification de la formation : ".$formation->forma_nom();
$content = ob_get_clean();
require_once "views/template.php";
