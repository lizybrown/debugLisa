<?php

require_once "models/levresManager.php";
require_once "controllers/GlobalController.php";

class LevresController {

    private $levresManager;

    public function __construct() {
        $this->levresManager = new LevresManager();
        $this->levresManager->chargementLevres();
    }

    public function afficherLevres() {
        $levres = $this->levresManager->getLevres();
        // require "views/majView.php";
    }

    public function afficherLevre($id_prestaLevre) {
        $levre = $this->levresManager->getLevreById($id_prestaLevre);
        if (!$levre) {
            throw new Exception('La prestation que vous recherchez n\'existe pas.');
        }
        // require "views/afficherLevreView.php";
    }

    public function ajoutLevre() {
        require "views/ajoutPrestaLevre.php";
    }

    public function ajoutLevreValidation() {

        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['prestaLevre_nom'],$file,$repertoire);
        $this->levresManager->ajoutLevreBD($_POST['prestaLevre_nom'],$_POST['prestaLevre_prix'],$_POST['prestaLevre_descr'],$image);
        header("location:".URL."Levres");

    }

    public function supprimerLevre($id_prestaLevre) {
        $monImage = $this->levresManager->getLevreById($id_prestaLevre)->getImage();
        unlink("public/images/".$monImage);
        $this->levresManager->supprimerLevreBD($id_prestaLevre);
        GlobalController::alert("success","prestation supprimée");
        header("location:".URL."levres");
    }

    public function modifierLevre($id_prestaLevre) {
        $levre = $this->levresManager->getLevreById($id_prestaLevre);
        require "views/modifPrestaLevre.php";
    }

    public function modifierLevreValider() {
        $imgActuelle = $this->levresManager->getLevreById($_POST['id_prestaLevre'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['prestaLevre_nom'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->levresManager->modifierLevreBD($_POST['id_prestaLevre'],$_POST['prestaLevre_nom'],$_POST['prestaLevre_prix'],$_POST['prestaLevre_descr'], $imgToAdd);
        header("location:".URL."levres");
    }

}