<?php
class Auth{
    private $pdo;

    public function__construct($pdo){
        $this->pdo=$pdo;

    }

//comparamos los datos de la tabla con los datos del usuario 
public function login($username,$password){  //dentro del parentesis los datos del usuario 
  $stmt=$this->pdo->prepare('SELECT * FROM users WHERE username=username'); //siglas para resultado en una base de datos 
        $stmt->execute(['username=> $username']);
        // comparan la base de datos 
        $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password,$user['password'])){
            $_SESSION['user_id']=$user['id'];
            return true;
}   
return false;

}
public function logout(){
    session_destroy();  
}

}

?>