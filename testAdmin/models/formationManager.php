<?php

require_once "modelClass.php";
require_once "formationClass.php";

class FormationManager extends Model {

    private $formations = [];

    public function ajoutformation($formation) {
        $this->formations[] = $formation;
    }

    public function getForma() {
        return $this->formations;
    }

    public function getFormaById($id_Forma) {
        foreach($this->formations as $formation) {
            if ($formation->getId_Forma() == $id_Forma) {
                return $formation;
            }
        }
    }

    public function chargementFormations() {
        $sql = "SELECT * FROM formation";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Formation($value->id_forma,$value->forma_nom,$value->forma_descr, $value->forma_prix,$value->content, $value->quantity, $value->image);
            $this->ajoutformation($add);
        }
    }

    public function ajoutFormaBD($forma_nom,$forma_descr,$forma_prix, $content,$quantity, $image){
        $sql = "INSERT INTO formation (forma_nom, forma_descr, forma_prix, content, quantity, image) values (:forma_nom,forma_descr,:forma_prix, :content, :quantity, :image)";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":forma_nom"=>$forma_nom,
            ":forma_descr"=>$forma_descr,
            ":forma_prix"=>$forma_prix,
            ":content"=>$content,
            ":quantity"=>$quantity,
            ":image"=>$image
        ]);
    }

    public function supprimerFormaBD($id_forma) {
        $sql = "DELETE FROM formation WHERE id_forma = :id_forma";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id_forma" => $id_forma
        ]);
    }

    public function modifierFormaBD($id_forma, $forma_nom,$forma_descr,$forma_prix,$content, $quantity, $image) {
        $sql = "UPDATE formation SET forma_nom = :forma_nom,  forma_descr = :forma_descr, forma_prix = :forma_prix, content= :content, quantity = :quantity, image = :image WHERE id_forma = :id_forma";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":id_forma" => $id_forma,
            ":forma_nom" => $forma_nom,
            ":forma_prix" =>$forma_descr,
            ":forma_prix" => $forma_prix,
            ":content" => $content,
            ":quantity" => $quantity,
            ":image" => $image,
            
        ]);
    }
}