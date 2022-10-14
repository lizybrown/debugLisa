<?php ob_start() ?>

<form action="<?=URL?>prestaLevre/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaLevre_nom" class="form-label">Intitulé de la prestation Levre</label>
        <input type="text" class="form-control" id="prestaLevre_nom" name="prestaLevre_nom">
    </div>
    <div class="mb-3">
        <label for="prestaLevre_descr" class="form-label">Description de la prestation Levre</label>
        <input type="text" class="form-control" id="prestaLevre_descr" name="prestaLevre_descr">
    </div>
  
    <div class="mb-3">
        <label for="prestaLevre_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaLevre_prix" name="prestaLevre_prix">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout d'une prestation Levre";
$content = ob_get_clean();
require_once "views/template.php";
