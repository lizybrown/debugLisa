<?php

class Regard {

    private $id_prestaRegard;
    private $prestaRegard_nom;
    private $prestaRegard_prix;
    private $prestaRegard_descr;
    private $image;

    public function __construct($id_prestaRegard,$prestaRegard_nom,$prestaRegard_prix, $prestaRegard_descr, $image) {
        $this->id_prestaRegard = $id_prestaRegard;
        $this->prestaRegard_nom = $prestaRegard_nom;
        $this->prestaRegard_prix = $prestaRegard_prix;
        $this->prestaRegard_descr = $prestaRegard_descr;
        $this->image = $image;
    }

    public function getId_PrestaRegard() {
        return $this->id_prestaRegard;
    }
    public function setId_PrestaRegard($id_prestaRegard) {
        $this->id_prestaRegard = $id_prestaRegard;
    }

    public function getPrestaRegard_nom() {
        return htmlspecialchars($this->prestaRegard_nom);
    }
    public function setPrestaRegard_nom($prestaRegard_nom) {
        $this->prestaRegard_nom = $prestaRegard_nom;
    }

    public function getPrestaRegard_prix(){
        return $this->prestaRegard_prix;
    }

    public function setPrestaRegard_prix($prestaRegard_prix){
        $this->prestaRegard_prix = $prestaRegard_prix;
    }
    
    public function getPrestaRegard_descr(){
        return $this->prestaRegard_descr;
    }

    public function setPrestaRegard_descr($prestaRegard_descr){
        $this->PrestaRegard_descr = $prestaRegard_descr;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}