<?php

require_once "modelClass.php";
require_once "regardClass.php";

class RegardManager extends Model {

    private $regards = [];

    public function ajoutRegard($regard) {
        $this->regards[] = $regard;
    }

    public function getregards() {
        return $this->regards;
    }

    public function getRegardById($id_prestaRegard) {
        foreach($this->regards as $regard) {
            if ($regard->getId_prestaregard() == $id_prestaRegard) {
                return $regard;
            }
        }
    }

    public function chargementRegards() {
        $sql = "SELECT * FROM prestaregard";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Regard($value->id_prestaRegard,$value->prestaRegard_nom,$value->prestaRegard_prix,$value->prestaRegard_descr,$value->image);
            $this->ajoutRegard($add);
        }
    }

    public function ajoutRegardBD($prestaRegard_nom,$prestaRegard_prix,$prestaRegard_descr,$image){
        $sql = "INSERT INTO prestaregard (prestaRegard_nom, prestaRegard_prix, prestaRegard_descr, image) values (:prestaRegard_nom,:prestaRegard_prix,prestaRegard_descr, :image)";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaRegard_nom"=>$prestaRegard_nom,
            ":prestaRegard_prix"=>$prestaRegard_prix,
            ":prestaRegard_descr"=>$prestaRegard_descr,
            ":image"=>$image
        ]);
    }

    public function supprimerRegardBD($id_prestaRegard) {
        $sql = "DELETE FROM prestaregard WHERE id_prestaRegard = :id_prestaRegard";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id_prestaRegard" => $id_prestaRegard
        ]);
    }

    public function modifierRegardBD($id_prestaRegard, $prestaRegard_nom,$prestaRegard_prix,$prestaRegard_descr,$image) {
        $sql = "UPDATE prestaRegard SET prestaRegard_nom = :prestaRegard_nom, prestaRegard_prix = :prestaRegard_prix, prestaRegard_descr = :prestaRegard_descr, image = :image WHERE id_prestaRegard = :id_prestaRegard";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaRegard_nom" => $prestaRegard_nom,
            ":prestaRegard_prix" => $prestaRegard_prix,
            ":prestaRegard_prix" =>$prestaRegard_descr,
            ":id_prestaRegard" => $id_prestaRegard,
            ":image" => $image,
            
        ]);
    }
}