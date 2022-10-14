<?php

require_once "models/modelClass.php";
require_once "models/userClass.php";


class UserManager extends Model{
    private $user = [];

    public function ajoutUser($user) {
        $this->users[] = $user;
    }

    public function getUsers() {
        return $this->users;
    }

    public function getUserById($id_user) {
            foreach($this->users as $user){
                if($user->getId_user() == $id_user){
                    return $user;
                }
            }      
        }

    public function FindUserByPseudoDB($pseudo){
            $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
            $req = $this->getBdd()->prepare($sql);
            $result = $req->execute([
                ":pseudo"=>$pseudo
            ]);
            $data = $req->fetch(PDO::FETCH_OBJ);
            if (!empty($data)){
                $user = new Users($data->id_user,
                $data->pseudo,
                $data->password,
                $data->id_role);
                return $user;
            }
            else{
                return null;
            }
        }

        function AffichageUsers() {
            $sql = "SELECT * FROM users ORDER BY pseudo";
            $req = $this->getBdd()->prepare($sql);
            $req->execute([]);
            $result = $req->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

       

        function insertUserDB($pseudo, $password) {
            $sql = "INSERT INTO users (pseudo, password) VALUES (:pseudo, :password)";
            $req = $this->getBdd()->prepare($sql);
            $result = $req->execute([
                ":pseudo"=>$pseudo,
                ":password"=>$password
            ]);
            return $result;
        }

        public function lastId(){
                $lastId = $this->getBdd()->lastInsertId();
                return $lastId;
            }

            public function sessionUser($user){
                $_SESSION['user'] = $user;
            }

    }

    


