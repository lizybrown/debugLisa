<?php

require_once "modelClass.php";
require_once "levresClass.php";

class LevresManager extends Model {

    private $levres = [];

    public function ajoutLevre($levre) {
        $this->levres[] = $levre;
    }

    public function getLevres() {
        return $this->levres;
    }

    public function getLevreById($id_prestaLevre) {
        foreach($this->levres as $levre) {
            if ($levre->getId_prestaLevre() == $id_prestaLevre) {
                return $levre;
            }
        }
    }

    public function chargementLevres() {
        $sql = "SELECT * FROM prestalevres";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Levres($value->id_prestaLevre,$value->prestaLevre_nom,$value->prestaLevre_prix,$value->prestaLevre_descr,$value->image);
            $this->ajoutLevre($add);
        }
    }

    public function ajoutLevreBD($prestaLevre_nom,$prestaLevre_prix,$prestaLevre_descr,$image){
        $sql = "INSERT INTO prestalevres (prestaLevre_nom, prestaLevre_prix, prestaLevre_descr, image) values (:prestaLevre_nom,:prestaLevre_prix,prestaLevre_descr, :image)";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaLevre_nom"=>$prestaLevre_nom,
            ":prestaLevre_prix"=>$prestaLevre_prix,
            ":prestaLevre_descr"=>$prestaLevre_descr,
            ":image"=>$image
        ]);
    }

    public function supprimerLevreBD($id_prestaLevre) {
        $sql = "DELETE FROM prestalevres WHERE id_prestaLevre = :id_prestaLevre";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id_prestaLevre" => $id_prestaLevre
        ]);
    }

    public function modifierLevreBD($id_prestaLevre, $prestaLevre_nom,$prestaLevre_prix,$prestaLevre_descr,$image) {
        $sql = "UPDATE prestalevres SET prestaLevre_nom = :prestaLevre_nom, prestaLevre_prix = :prestaLevre_prix, prestaLevre_descr = :prestaLevre_descr, image = :image WHERE id_prestaLevre = :id_prestaLevre";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaLevre_nom" => $prestaLevre_nom,
            ":prestaLevre_prix" => $prestaLevre_prix,
            ":prestaLevre_prix" =>$prestaLevre_descr,
            ":id_prestaLevre" => $id_prestaLevre,
            ":image" => $image,
            
        ]);
    }
}