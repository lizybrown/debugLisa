<?php
session_start();
require_once "controllers/LevresController.php";
require_once "controllers/PeauController.php";
require_once "controllers/RegardController.php";
require_once "controllers/FormationController.php";
require_once "controllers/MkController.php";
require_once "controllers/UserController.php";
require_once "controllers/RoleController.php";
// echo password_hash('SeveOne1',PASSWORD_DEFAULT);

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? " https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$levresController = new LevresController;
$peauController = new PeauController;
$regardController = new RegardController;
$formationController = new FormationController;
$mkController = new MkController;
$userController = new UserController;
$roleController = new RoleController;

try {
    if (empty($_GET['page'])) {
        require "views/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "views/accueilView.php";
                break;
            case "prestations":
            if (empty($url[1])) {
                $mkController->afficherTout();
                break;
                }
            case "formations":
                $formationController->afficherFormations();
            if ($url[1] ==="modifier") {
                $formationController->modifierForma($url[2]);
            } else if($url[1] === "modifValider"){
                $formationController->modifierFormaValider($url[2]);
            } else if($url[1] ==="supprimer"){
                $formationController->supprimerForma($url[2]);
            } else if ($url[1] ==="ajouter") {
                $formationController->ajoutForma();
            } else if ($url[1] ==="valider") {
                $formationController->ajoutFormaValidation();
            } else {
                throw new Exception("Error 404, la formation n'existe pas");
            }
            case "prestaRegard":
                if (empty($url[1])) {
                    $regardController->afficherRegards();
                } else if ($url[1] === "modifier") {
                    $regardController->modifierRegard($url[2]);
                } else if($url[1] === "modifValider"){
                    $regardController->modifierRegardValider($url[2]);
                } else if ($url[1] === "supprimer") {
                    $regardController->supprimerRegard($url[2]);
                } else if ($url[1] === "ajouter") {
                    $regardController->ajoutRegard();
                } else if ($url[1] === "valider") {
                    $regardController->ajoutRegardValidation();
                } else {
                        throw new Exception("Error 404, la prestation n'existe pas");
                }
            case "prestaPeau":
                if (empty($url[1])) {
                    $peauController->afficherPeaux();
                } else if ($url[1] === "modifier") {
                    $peauController->modifierPeau($url[2]);
                } else if($url[1] === "modifValider"){
                    $peauController->modifierPeauValider($url[2]);
                } else if ($url[1] === "supprimer") {
                    $peauController->supprimerPeau($url[2]);
                } else if ($url[1] === "ajouter") {
                    $peauController->ajoutPeau();
                } else if ($url[1] === "valider") {
                    $peauController->ajoutPeauValidation();
                } else {
                            throw new Exception("Error 404, la prestation n'existe pas");
                }

            case "prestaLevre":
                if (empty($url[1])) {
                $levresController->afficherLevres();
                }else if ($url[1] === "modifier") {
                $levresController->modifierLevreValider($url[2]);
                } else if ($url[1] === "supprimer") {
                $levresController->supprimerLevre($url[2]);
                } else if ($url[1] === "ajouter") {
                $levresController->ajoutLevre();
                } else if ($url[1] === "valider") {
                $levresController->ajoutLevreValidation();
                } else {
                    throw new Exception("Error 404, la prestation n'existe pas");
                }
                break;
            default:
                throw new Exception('Error 404, page not found'); 

            case "connexion":
                $userController->loginForm();
                break;
            case "connexion_valid":
                $userController->login();
                break;
            case "deconnexion":
                $userController->deconnexion();
                break;

            case "admin":
                $userController->loginFormAdmin();
                break;
            case "admin_valid":
                $userController->loginAdmin();
                break;
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/erreurView.php";
}
