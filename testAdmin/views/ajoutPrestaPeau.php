<?php ob_start() ?>

<form action="<?=URL?>prestaPeau/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaPeau_nom" class="form-label">Intitulé de la prestation Peau</label>
        <input type="text" class="form-control" id="prestaPeau_nom" name="prestaPeau_nom">
    </div>
    <div class="mb-3">
        <label for="prestaPeau_descr" class="form-label">Description de la prestation Peau</label>
        <input type="text" class="form-control" id="prestaPeau_descr" name="prestaPeau_descr">
    </div>
  
    <div class="mb-3">
        <label for="prestaPeau_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaPeau_prix" name="prestaPeau_prix">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout d'une prestation Peau";
$content = ob_get_clean();
require_once "views/template.php";
