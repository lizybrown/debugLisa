<?php

require_once "models/levresManager.php";
require_once "models/peauManager.php";
require_once "models/formationManager.php";
require_once "models/regardManager.php";
require_once "controllers/GlobalController.php";

class MkController {

    private $totalLevres;
    private $totalPeaux;
    private $totalRegards;
    private $totalFormations;

    public function __construct() {
        $this->totalLevres = new LevresManager();
        $this->totalLevres->chargementLevres();

        $this->totalPeaux = new PeauManager();
        $this->totalPeaux->chargementPeaux();

        $this->totalRegards = new RegardManager();
        $this->totalRegards->chargementRegards();
    
    
        $this->totalFormations = new FormationManager();
        $this->totalFormations->chargementformations();
    }


    public function afficherTout() {
        $levres = $this->totalLevres->getLevres();
        $peaux = $this->totalPeaux->getPeaux();
        $regards = $this->totalRegards->getRegards();
        $formations = $this->totalFormations->getForma();

        require "views/majView.php";
    }

    

}