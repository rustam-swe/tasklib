<?php
require __DIR__ . "/../../db.php";

class TaskModel {
    public \PDO $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
    public function addTask($title, $description, $difficulty, $active = false, $status = 'drafted') {
        try {
            $query = "INSERT INTO tasks (title, description, active, status, difficulty) VALUES (:title, :description, :active, :status, :difficulty)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':active', $active, PDO::PARAM_BOOL);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error adding task: " . $e->getMessage());
            throw new Exception("Failed to add task: " . $e->getMessage());
        }
    }

      public function getTaskById($id) {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTasks() {
        try {
            $query = "SELECT * FROM tasks";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all tasks as an associative array
        } catch (PDOException $e) {
            error_log("Error getting all tasks: " . $e->getMessage());
            throw new Exception("Failed to get all tasks: " . $e->getMessage());
        }
    }
      
}
