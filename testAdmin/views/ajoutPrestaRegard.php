<?php ob_start() ?>

<form action="<?=URL?>prestaRegard/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prestaRegard_nom" class="form-label">Intitulé de la prestation Regard</label>
        <input type="text" class="form-control" id="prestaRegard_nom" name="prestaRegard_nom">
    </div>
    <div class="mb-3">
        <label for="prestaRegard_descr" class="form-label">Description de la prestation Regard</label>
        <input type="text" class="form-control" id="prestaRegard_descr" name="prestaRegard_descr">
    </div>
  
    <div class="mb-3">
        <label for="prestaRegard_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="prestaRegard_prix" name="prestaRegard_prix">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout d'une prestation regard";
$content = ob_get_clean();
require_once "views/template.php";
