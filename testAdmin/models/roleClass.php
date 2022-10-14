<?php

class Role{

    private $id_role;
    private $role_nom;


    public function __construct($id_role,$role_nom) {
        $this->id_role = $id_role;
        $this->role_nom = $role_nom;
    }

    public function getId_role(){
        return $this->id_role;
    }

    public function setId_role($id_role){
        $this->id_role = $id_role;
    }

    public function getRole_nom(){
        return $this->role_nom;
    }

    public function setRole_nom($role_nom){
        $this->role_nom = $role_nom;
    }
}