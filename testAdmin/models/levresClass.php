<?php

class Levres {

    private $id_prestaLevre;
    private $prestaLevre_nom;
    private $prestaLevre_prix;
    private $prestaLevre_descr;
    private $image;

    public function __construct($id_prestaLevre,$prestaLevre_nom,$prestaLevre_prix,$prestaLevre_descr,$image) {
        $this->id_prestaLevre = $id_prestaLevre;
        $this->prestaLevre_nom = $prestaLevre_nom;
        $this->prestaLevre_prix = $prestaLevre_prix;
        $this->prestaLevre_descr = $prestaLevre_descr;
        $this->image = $image;
    }

    public function getId_PrestaLevre() {
        return $this->id_prestaLevre;
    }
    public function setId_PrestaLevre($id_prestaLevre) {
        $this->id_prestaLevre = $id_prestaLevre;
    }

    public function getPrestaLevre_nom() {
        return htmlspecialchars($this->prestaLevre_nom);
    }
    public function setPrestaLevre_nom($prestaLevre_nom) {
        $this->prestaLevre_nom = $prestaLevre_nom;
    }

    public function getPrestaLevre_prix(){
        return $this->prestaLevre_prix;
    }

    public function setPrestaLevre_prix($prestaLevre_prix){
        $this->prestaLevre_prix = $prestaLevre_prix;
    }
    
    public function getPrestaLevre_descr(){
        return $this->prestaLevre_descr;
    }

    public function setPrestaLevre_descr($prestaLevre_descr){
        $this->prestaLevre_descr = $prestaLevre_descr;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}