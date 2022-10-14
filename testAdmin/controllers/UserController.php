<?php
require_once "models/userManager.php";
require_once "controllers/GlobalController.php";
class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager;
    }

    public function loginForm(){
        require "views/loginView.php";
    }

    public function loginFormAdmin(){
        require "views/loginAdminView.php";
    }

    public function registerForm(){
        require "views/registerView.php";
    }

    public function register(){
        try{
            if(empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['cpassword']) && isset($_POST['pseudo'], $_POST['password'], $_POST['cpassword'])){
                throw new Exception("Merci de renseigner tout les champs");   
            }
            if($_POST['password'] == $_POST['cpassword']){
                $userExist = $this->userManager->FindUserByPseudoDB($_POST['pseudo']);

                if(!$userExist){
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    
                }   
                else{
                    throw new Exception("L'utilisateur existe déjà.");
                }
            }
            else{
                throw new Exception("Les deux mots de passes ne sont pas identiques.");
            }
            $this->userManager->insertUserDB($_POST['pseudo'],$password);
            $user = new Users($this->userManager->lastId(),$_POST['pseudo'],$password,2);
            $this->userManager->sessionUser($user);
            GlobalController::alert("success", "Compte crée avec succès");
        }catch(Exception $e){
            GlobalController::alert("danger", $e->getMessage());
        }
        header("Location: ".URL);
    }

    public function loginAdmin(){
        try{
            if(empty($_POST['pseudo']) || empty($_POST['password'])){
                throw new Exception("Renseignez tous les champs");   
            }
            $admin = $this->userManager->FindUserByPseudoDB($_POST['pseudo']);
            if(isset($admin)){
                $password=$admin->getPassword();
                if(password_verify($_POST['password'],$password)){
                    if ($admin->getId_role() == 1)
                    $this->userManager->sessionUser($admin);
                    $_SESSION['role']='administrateur';
                    }
            }else{
                    throw new Exception("L'utisateur et/ou le mdp est incorrect");
                }
                GlobalController::alert("success", "Bonjour ".$admin->getPseudo() . ', tu es ' .$_SESSION['role']. ' de ce site');
                header("location:".URL."prestations");  
        }
        catch(Exception $e){
            GlobalController::alert("danger", $e->getMessage());
            header("Location:".URL."accueil");
        }
        
    }

    public function login(){
        try{
            if(empty($_POST['pseudo']) || empty($_POST['password'])){
                throw new Exception("Renseignez tous les champs");   
            }
            $user = $this->userManager->FindUserByPseudoDB($_POST['pseudo']);
            if(isset($user)){ 
                $password=$user->getPassword();   
                if(password_verify($_POST['password'],$password)){
                    $this->userManager->sessionUser($user);
                    }
                }else{
                    throw new Exception("L'utisateur et/ou le mdp est incorrect");
                }
            GlobalController::alert("success", "Bonjour ".$user->getPseudo());
        }catch(Exception $e){
            GlobalController::alert("danger", $e->getMessage());
        }
        header("Location:".URL);
    }

    public function deconnexion(){
        session_destroy();
        setcookie('user',"",1);
        header("location: ".URL);
    }

    
}