<?php

//el index va a arrancar todo

require_once "../config/database.php" //importamos la base de datos

$action = isset($_GET['action']) ? $_GET['action'] : "home";

switch($action){
    case "user":
        require_once "../controllers/UserController.php";
        $controller = new UserController($pdo);
        $controller->index();
        break;
        case "user_create":
            require_once "../controllers/UserController.php";
            $controller = new UserController($pdo);
            $controller->create();
            break;
            case "login":
                require_once "../controllers/UserController.php";
                $controller = new UserController($pdo);
                $controller->login();
                break;
                case "logout":
                    require_once "../controllers/UserController.php";
                    $controller = new UserController($pdo);
                    $controller->logout()
                    ;
                    break;
    case "home":
            require_once "../controllers/UserController.php";
            $controller = new UserController($pdo);
            $controller->index();
            break;
    default:
        require_once "../controllers/UserController.php";
        $controller = new UserController($pdo);
        $controller->index();
        break;
}