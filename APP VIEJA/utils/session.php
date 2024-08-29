<?php
/*
session_start();

$sql="SELECT * FROM usuarios WHERE nombre='nico' AND clave='123'";

$_SESSION['user_id']=123;



if(isset($_SESSION['user_id'])){  existe o no existe la variable ,si existe hace el echo .
    echo $_SESSION['user_id'];


}
session_destroy();
*/

session_start();
function isLoggedIn(){   //nos retorna un verdadero o falso ,pregunta si existe o no la variable sesion
    //return isset($_SESSION['user_id']); //va a devolver un true 
        return isset($_SESSION['user_id']);

    function requireLogin(){
        if(!sLoggedIn())
        header('location: index.php?action=login') //te redirige al formulario de loggeo 
        exit;
    }        
}
?>