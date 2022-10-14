<?php

class Users{

    private $id_user;
    private $pseudo;
    private $password;
    private $id_role;


    public function __construct($id_user,$pseudo,$password,$id_role) {
        $this->id_user = $id_user;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->id_role = $id_role;

    }

    public function getId_user(){
        return $this->id_user;
    }

    public function setId_user($id_user){
        $this->id_user = $id_user;
    }


    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
    $this->password = $password;
    }

    public function getId_role()
    {
        return $this->id_role;
    }

    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }


}