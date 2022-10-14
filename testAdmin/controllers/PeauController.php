<?php

require_once "models/peauManager.php";
require_once "controllers/GlobalController.php";

class PeauController {

    private $peauManager;

    public function __construct() {
        $this->peauManager = new PeauManager();
        $this->peauManager->chargementPeaux();
    }

    public function afficherPeaux() {
        $peaux = $this->peauManager->getPeaux();
        // require "views/majView.php";
    }

    public function afficherPeau($id_prestaPeau) {
        $peau = $this->peauManager->getPeauById($id_prestaPeau);
        if (!$peau) {
            throw new Exception('La prestation que vous recherchez n\'existe pas.');
        }
        // require "views/afficherLevreView.php";
    }

    public function ajoutPeau() {
        require "views/ajoutPrestaPeau.php";
    }

    public function ajoutPeauValidation() {

        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['prestaPeau_nom'],$file,$repertoire);
        $this->PeauManager->ajoutPeauBD($_POST['prestaPeau_nom'],$_POST['prestaPeau_prix'],$_POST['prestaPeau_descr'],$image);
        header("location:".URL."prestaPeau");

    }

    public function supprimerPeau($id_prestaPeau) {
        $monImage = $this->peauManager->getPeauById($id_prestaPeau)->getImage();
        unlink("public/images/".$monImage);
        $this->peauManager->supprimerPeauBD($id_prestaPeau);
        GlobalController::alert("success","prestation supprimée");
        header("location:".URL."prestaPeau");
    }

    public function modifierPeau($id_prestaPeau) {
        $peau = $this->peauManager->getPeauById($id_prestaPeau);
        require "views/modifPrestaPeau.php";
    }

    public function modifierPeauValider() {
        $imgActuelle = $this->peauManager->getPeauById($_POST['id_prestaPeau'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['prestaPeau_nom'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->peauManager->modifierPeauBD($_POST['id_prestaPeau'],$_POST['prestaPeau_nom'],$_POST['prestaPeau_prix'],$_POST['prestaPeau_descr'], $imgToAdd);
        header("location:".URL."prestaPeau");
    }

}