<?php

require_once "models/formationManager.php";
require_once "controllers/GlobalController.php";

class FormationController {

    private $formationManager;

    public function __construct() {
        $this->formationManager = new FormationManager();
        $this->formationManager->chargementFormations();
    }

    public function afficherFormations() {
        $formations = $this->formationManager->getForma();
        // require "views/majView.php";
    }

    public function afficherFormation($id_forma) {
        $formation = $this->formationManager->getFormaById($id_forma);
        if (!$formation) {
            throw new Exception('La formation que vous recherchez n\'existe pas.');
        }
        // require "views/afficherLivreView.php";
    }

    public function ajoutForma() {
        require "views/ajoutFormaView.php";
    }

    public function ajoutFormaValidation() {

        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['forma_nom'],$file,$repertoire);
        $this->formationManager->ajoutFormaBD($_POST['forma_nom'],$_POST['forma_descr'],$_POST['forma_prix'],$_POST['content'],$_POST['quantity'],$image);
        header("location:".URL."formations");

    }

    public function supprimerForma($id_forma) {
        $monImage = $this->formationManager->getFormaById($id_forma)->getImage();
        unlink("public/images/".$monImage);
        $this->formationManager->supprimerFormaBD($id_forma);
        GlobalController::alert("success","formation supprimée");
        header("location:".URL."formations");
    }

    public function modifierForma($id_forma) {
        $formation = $this->formationManager->getFormaById($id_forma);
        require "views/modifFormaView.php";
    }

    public function modifierFormaValider() {
        $imgActuelle = $this->formaManager->getFormaById($_POST['id_forma'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['forma_nom'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->formaManager->modifierFormaBD($_POST['id_forma'],$_POST['forma_nom'],$_POST['forma_descr'],$_POST['forma_prix'],$_POST['content'],$_POST['quantity'], $imgToAdd);
        header("location:".URL."formations");
    }

}