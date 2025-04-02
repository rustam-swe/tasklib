<?php
require __DIR__ . "/../../db.php";
class UserModel {
    public \PDO $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function addUser($name, $email, $password, $role = 'user') {
        try {
            $query = "INSERT INTO users (name, email, role, password) VALUES (:name, :email, :role, :password)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Use hashed password
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error adding user: " . $e->getMessage());
            throw new Exception("Failed to add user: " . $e->getMessage());
        }
    }

    public function deleteUser($id) {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount(); // Return number of deleted rows
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            throw new Exception("Failed to delete user: " . $e->getMessage());
        }
    }

     public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
