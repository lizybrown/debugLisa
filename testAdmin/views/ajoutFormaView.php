<?php ob_start() ?>

<form action="<?=URL?>formations/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="forma_nom" class="form-label">Intitulé de la formation</label>
        <input type="text" class="form-control" id="forma_nom" name="forma_nom">
    </div>
    <div class="mb-3">
        <label for="forma_descr" class="form-label">Description de la formation</label>
        <input type="text" class="form-control" id="forma_descr" name="forma_descr">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenu de la formation</label>
        <input type="text" class="form-control" id="content" name="content">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Nombre de places</label>
        <input type="number" class="form-control" id="quantity" name="quantity">
    </div>
    <div class="mb-3">
        <label for="forma_prix" class="form-label">Prix</label>
        <input type="number" class="form-control" id="forma_prix" name="forma_prix">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout d'une formation";
$content = ob_get_clean();
require_once "views/template.php";
