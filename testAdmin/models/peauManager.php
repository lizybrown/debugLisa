<?php

require_once "modelClass.php";
require_once "peauClass.php";

class PeauManager extends Model {

    private $peaux = [];

    public function ajoutPeau($peau) {
        $this->peaux[] = $peau;
    }

    public function getPeaux() {
        return $this->peaux;
    }

    public function getPeauById($id_prestaPeau) {
        foreach($this->peaux as $peau) {
            if ($peau->getId_prestaPeau() == $id_prestaPeau) {
                return $peau;
            }
        }
    }

    public function chargementPeaux() {
        $sql = "SELECT * FROM prestapeau";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Peau($value->id_prestaPeau,$value->prestaPeau_nom,$value->prestaPeau_prix,$value->prestaPeau_descr,$value->image);
            $this->ajoutPeau($add);
        }
    }

    public function ajoutPeauBD($prestaPeau_nom,$prestaPeau_prix,$prestaPeau_descr,$image){
        $sql = "INSERT INTO prestapeau (prestaPeau_nom, prestaPeau_prix, prestaPeau_descr, image) values (:prestaPeau_nom,:prestaPeau_prix,prestaPeau_descr, :image)";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaPeau_nom"=>$prestaPeau_nom,
            ":prestaPeau_prix"=>$prestaPeau_prix,
            ":prestaPeau_descr"=>$prestaPeau_descr,
            ":image"=>$image
        ]);
    }

    public function supprimerPeauBD($id_prestaPeau) {
        $sql = "DELETE FROM prestapeau WHERE id_prestaPeau = :id_prestaPeau";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id_prestaPeau" => $id_prestaPeau
        ]);
    }

    public function modifierPeauBD($id_prestaPeau, $prestaPeau_nom,$prestaPeau_prix,$prestaPeau_descr,$image) {
        $sql = "UPDATE prestapeau SET prestaPeau_nom = :prestaPeau_nom, prestaPeau_prix = :prestaPeau_prix, prestaPeau_descr = :prestaPeau_descr, image = :image WHERE id_prestaPeau = :id_prestaPeau";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":prestaPeau_nom" => $prestaPeau_nom,
            ":prestaPeau_prix" => $prestaPeau_prix,
            ":prestaPeau_prix" =>$prestaPeau_descr,
            ":id_prestaPeau" => $id_prestaPeau,
            ":image" => $image,
            
        ]);
    }
}