<?php
declare(strict_types=1);

namespace App\Models;

use \Core\Models\Model;
use \Core\DB;
use \PDO;
use \PDOException;
use \Exception;

class User implements Model{
    public PDO $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    public function addUser($name, $email, $password, $role = 'user') {
        try {
            $query = "INSERT INTO users (name, email, role, password) VALUES (:name, :email, :role, :password)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error adding user: " . $e->getMessage());
            throw new Exception("Failed to add user: " . $e->getMessage());
        }
    }

    public function all() {
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $e) {
            error_log("Error getting all tasks: " . $e->getMessage());
            throw new Exception("Failed to get all tasks: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            throw new Exception("Failed to delete user: " . $e->getMessage());
        }
    }

     public function find($id) { # id emas
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email) {
        $query = "SELECT id, email, password FROM users WHERE email = :email"; 
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();
    
        return $user;
    }

}