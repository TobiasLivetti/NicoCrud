<?php

require_once '../models/Auth.php';

class AuthController{
    private $authModel

    public function__construct($pdo){  //clase
        $this->authModel=new Auth($pdo) //la llamamos modelo auth  
    }
public function login(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];
        if(this->authModel->login($username,$password)){
            header('Location: index.php?action=user');
        }else{
            $error='Credenciales invalidas';
            require_once'../views/login.php';
        }
}
public_function logout(){
$this->authModel->logout();
header('Location: index.php');


}
}
//modelo ejecuta las funciones que se los pasa el controlador
//le manda ordenes al modelo 

}

?>
