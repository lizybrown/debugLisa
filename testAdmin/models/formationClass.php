<?php

class Formation {

    private $id_forma;
    private $forma_nom;
    private $forma_descr;
    private $forma_prix;
    private $content;
    private $quantity;
    private $image;

    public function __construct($id_forma,$forma_nom,$forma_descr,$forma_prix, $content,$quantity,$image) {
        $this->id_forma = $id_forma;
        $this->forma_nom = $forma_nom;
        $this->forma_descr = $forma_descr;
        $this->forma_prix = $forma_prix;
        $this->content = $content;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    public function getId_forma() {
        return $this->id_forma;
    }
    public function setId_forma($id_forma) {
        $this->id_formasetId_forma = $id_forma;
    }

    public function getForma_nom() {
        return htmlspecialchars($this->forma_nom);
    }
    public function setForma_nom($forma_nom) {
        $this->forma_nom = $forma_nom;
    }

    public function getForma_prix(){
        return $this->forma_prix;
    }

    public function setforma_prix($forma_prix){
        $this->forma_prix = $forma_prix;
    }
    
    public function getForma_descr(){
        return $this->forma_descr;
    }

    public function setForma_descr($forma_descr){
        $this->forma_descr = $forma_descr;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity=$quantity;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}