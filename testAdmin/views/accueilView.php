<?php ob_start() ?>

<p> Bienvenu dans l'espace mise à jour MK Beauty</p>

<!-- integrer formulaire de connexion -->

<a href="<?= URL ?>connexion">Me connecter à mon espace admin</a> 
<?php
$titre = "Page d'accueil";
$content = ob_get_clean();
require_once "views/template.php";