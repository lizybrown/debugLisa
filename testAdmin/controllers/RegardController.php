<?php

require_once "models/regardManager.php";
require_once "controllers/GlobalController.php";

class RegardController {

    private $regardManager;

    public function __construct() {
        $this->regardManager = new regardManager();
        $this->regardManager->chargementRegards();
    }

    public function afficherRegards() {
        $regard = $this->regardManager->getRegards();
        // require "views/majView.php";
    }

    public function afficherRegard($id_prestaRegard) {
        $regard = $this->regardManager->getRegardById($id_prestaRegard);
        if (!$regard) {
            throw new Exception('La prestation que vous recherchez n\'existe pas.');
        }
        // require "views/afficherLevreView.php";
    }

    public function ajoutRegard() {
        require "views/ajoutPrestaregard.php";
    }

    public function ajoutRegardValidation() {

        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['prestaRegard_nom'],$file,$repertoire);
        $this->regardManager->ajoutRegardBD($_POST['prestaRegard_nom'],$_POST['prestaRegard_prix'],$_POST['prestaRegard_descr'],$image);
        header("location:".URL."Regards");

    }

    public function supprimerRegard($id_prestaRegard) {
        $monImage = $this->regardManager->getRegardById($id_prestaRegard)->getImage();
        unlink("public/images/".$monImage);
        $this->regardManager->supprimerRegardBD($id_prestaRegard);
        GlobalController::alert("success","prestation supprimée");
        header("location:".URL."regard");
    }

    public function modifierRegard($id_prestaRegard) {
        $regard = $this->regardManager->getRegardById($id_prestaRegard);
        require "views/modifPrestaRegard.php";
    }

    public function modifierRegardValider() {
        $imgActuelle = $this->regardManager->getRegardById($_POST['id_prestaRegard'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['prestaRegard_nom'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->regardManager->modifierRegardBD($_POST['id_prestaRegard'],$_POST['prestaRegard_nom'],$_POST['prestaRegard_prix'],$_POST['prestaRegard_descr'], $imgToAdd);
        header("location:".URL."regard");
    }

}