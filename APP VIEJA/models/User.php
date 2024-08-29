<?php
//User es una clase, es la representacion de un usuario

class User {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo; //el propio obj. de this user
        /*este es de el private $pdo*/
    }
    public function getAllUsers(){
        $stmt = $this->pdo->query("SELECT * FROM users"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearUser(){
        //parametro para crear el usuario(porque es el quien se pone ese) es nombre, no id(lo hace la db)
        $stmt = $this->$pdo->prepare("INSERT INTO users (name) VALUES ('$name')"); 
        //se pone this pq es privado
        return $stmt-> execute([':name' => $name]);
    }



}

/*include ("../config/database.php");
$prueba = new User($pdo); //instancia de clase
$lista = $prueba->getAllUsers();
foreach ($lista as $persona){ //dentro de la lista me va a traer a una persona, cada uno de la lista es un apersona
    echo $persona['name'] . $persona['id'];
}*/



?>