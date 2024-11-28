<?php
// public/index.php
require_once '../config/database.php';
require_once '../utils/session.php';
require_once '../controllers/UserController.php';

header('Content-Type: application/json');

// Inicializa el controlador de usuarios
$controller = new UserController($pdo);

// Determina el método HTTP y la acción solicitada
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
$method = $_SERVER['REQUEST_METHOD'];

if ($action === 'user') {
    switch ($method) {
        case 'GET': 
            if (isset($_GET['id'])) {
                // Obtiene un usuario específico
                $user = $controller->getUserById((int)$_GET['id']);
                echo json_encode($user);
            } else {
                // Obtiene todos los usuarios
                $users = $controller->getAllUsers();
                echo json_encode($users);
            }
            break;

        case 'POST':
            // Crea un nuevo usuario
            $result = $controller->create();
            echo json_encode($result);
            break;

        case 'PUT':
            // Actualiza un usuario existente
            $data = json_decode(file_get_contents('php://input'), true);
            if (isset($data['id'])) {
                $result = $controller->edit((int)$data['id']);
                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'ID de usuario requerido']);
                http_response_code(400);
            }
            break;

        case 'DELETE':
            // Elimina un usuario específico
            if (isset($_GET['id'])) {
                $result = $controller->delete((int)$_GET['id']);
                echo json_encode($result);
            } else {
                echo json_encode(['message' => 'ID de usuario requerido']);
                http_response_code(400);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(['message' => 'Método no permitido']);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Recurso no encontrado']);
}
?>