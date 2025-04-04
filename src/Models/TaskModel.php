<?php
namespace App\src\Models;

class TaskModel {
    public \PDO $db;

    public function __construct() {
        $this->db = \App\Models\DB::connect();
    }
    public function addTask($title, $description, $difficulty, $active = false, $status = 'drafted') {# addTask funksiyasiga deadline qo’shish kerak
        try {
            $query = "INSERT INTO tasks (title, description, active, status, difficulty) VALUES (:title, :description, :active, :status, :difficulty)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
            $stmt->bindParam(':active', $active, \PDO::PARAM_BOOL);
            $stmt->bindParam(':status', $status, \PDO::PARAM_STR);
            $stmt->bindParam(':difficulty', $difficulty, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error adding task: " . $e->getMessage());
            throw new \Exception("Failed to add task: " . $e->getMessage());
        }
    }

      public function getTaskById($id) {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllTasks() {
        try {
            $query = "SELECT * FROM tasks";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
        } catch (\PDOException $e) {
            error_log("Error getting all tasks: " . $e->getMessage());
            throw new \Exception("Failed to get all tasks: " . $e->getMessage());
        }
    }

    # RequiredKnowledge

    public function addRequiredKnowledge($taskId, $title, $resource) {
        try {
            $query = "INSERT INTO required_knowledge (task_id, title, resource) VALUES (:task_id, :title, :resource)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
            $stmt->bindParam(':resource', $resource, \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error adding required knowledge: " . $e->getMessage());
            throw new \Exception("Failed to add required knowledge: " . $e->getMessage());
        }
    }

    public function getRequiredKnowledgeByTaskId($taskId) {
        try {
            $query = "SELECT * FROM required_knowledge WHERE task_id = :task_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Error getting required knowledge by task ID: " . $e->getMessage());
            throw new \Exception("Failed to get required knowledge by task ID: " . $e->getMessage());
        }
    }

    # Requirements
      
    public function addRequirement($taskId, $title, $resource) {
        try {
            $query = "INSERT INTO requirements (task_id, title, resource) VALUES (:task_id, :title, :resource)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, \PDO::PARAM_STR);
            $stmt->bindParam(':resource', $resource, \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error adding requirement: " . $e->getMessage());
            throw new \Exception("Failed to add requirement: " . $e->getMessage());
        }
    }

    public function getRequirementsByTaskId($taskId) {
        try {
            $query = "SELECT * FROM requirements WHERE task_id = :task_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Error getting requirements by task ID: " . $e->getMessage());
            throw new \Exception("Failed to get requirements by task ID: " . $e->getMessage());
        }
    }
}