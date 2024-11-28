<?php
// controllers/UserController.php
require_once '../models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function getAllUsers() {
        $users = $this->userModel->getAllUsers();
        return $users;
    }

    public function getUserById($id) {
        $user = $this->userModel->getUserById($id);
        return $user;
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name']) && isset($data['password'])) {
            $name = $data['name'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->createUser($name, $password);
            http_response_code(201);
            echo json_encode(['message' => 'Usuario creado']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Faltan datos']);
        }
    }

    public function edit($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name']) && isset($data['password'])) {
            $name = $data['name'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->updateUser($id, $name, $password);
            http_response_code(200);
            echo json_encode(['message' => 'Usuario actualizado']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Faltan datos para actualizar']);
        }
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        http_response_code(200);
    }
}

