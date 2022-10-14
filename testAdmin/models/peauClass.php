<?php

class Peau {

    private $id_prestaPeau;
    private $prestaPeau_nom;
    private $prestaPeau_prix;
    private $prestaPeau_descr;
    private $image;

    public function __construct($id_prestaPeau,$prestaPeau_nom,$prestaPeau_prix, $prestaPeau_descr, $image) {
        $this->id_prestaPeau = $id_prestaPeau;
        $this->prestaPeau_nom = $prestaPeau_nom;
        $this->prestaPeau_prix = $prestaPeau_prix;
        $this->prestaPeau_descr = $prestaPeau_descr;
        $this->image = $image;
    }

    public function getId_PrestaPeau() {
        return $this->id_prestaPeau;
    }
    public function setId_PrestaPeau($id_prestaPeau) {
        $this->id_prestaPeau = $id_prestaPeau;
    }

    public function getPrestaPeau_nom() {
        return htmlspecialchars($this->prestaPeau_nom);
    }
    public function setPrestaPeau_nom($prestaPeau_nom) {
        $this->prestaPeau_nom = $prestaPeau_nom;
    }

    public function getPrestaPeau_prix(){
        return $this->prestaPeau_prix;
    }

    public function setPrestaPeau_prix($prestaPeau_prix){
        $this->prestaPeau_prix = $prestaPeau_prix;
    }
    
    public function getPrestaPeau_descr(){
        return $this->prestaPeau_descr;
    }

    public function setPrestaPeau_descr($prestaPeau_descr){
        $this->PrestaPeau_descr = $prestaPeau_descr;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}