<?php
// models/User.php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $password) {
        $stmt = $this->pdo->prepare('INSERT INTO users (name, password) VALUES (:name, :password)');
        return $stmt->execute([':name' => $name, ':password' => $password]);
    }

    public function updateUser($id, $name, $password) {
        $stmt = $this->pdo->prepare('UPDATE users SET name = :name, password = :password WHERE id = :id');
        return $stmt->execute([':name' => $name, ':password' => $password, ':id' => $id]);
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
?>
