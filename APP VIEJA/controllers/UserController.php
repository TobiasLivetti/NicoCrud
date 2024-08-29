<?php

require_once "../models/User.php";
require_once "../utils/session.php";

class UserController{
    private $userModel;

    public function__construct($pdo){
        $this -> userModel =  new User($pdo);            //acceder a los metodos

    }

    public function index(){
        $users = $this -> userModel -> getAllUsers();
        require_once "../views/user_create.php";
    }

    public function create(){
        requireLogin();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['name'];
            $this->userModel->createUser($name);
            header('Location: index.php?action=user');

        }else{
            require_once '..views/user_create.php';
            
        }

    }

//ver si hay datos esperando
}
    
?>