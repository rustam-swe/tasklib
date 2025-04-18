<?php
<<<<<<< HEAD
namespace App\src\Models;

class TaskModel {
    public \PDO $db;

    public function __construct() {
        $this->db = \DB::connect();
=======
declare(strict_types=1);

namespace App\Models;

use \Core\Models\Model;
use \Core\DB;
use \PDO;
use \PDOException;
use \Exception;

class TaskModel implements Model {
    public PDO $db;

    public function __construct() {
        $this->db = DB::connect();
>>>>>>> 70437b73e649c0930da15bf8740ccfd98a0f41e5
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

<<<<<<< HEAD
      public function getTaskById($id) {
=======
      public function find($id) {
>>>>>>> 70437b73e649c0930da15bf8740ccfd98a0f41e5
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

<<<<<<< HEAD
    public function getAllTasks() {
=======
    public function all() {
>>>>>>> 70437b73e649c0930da15bf8740ccfd98a0f41e5
        try {
            $query = "SELECT * FROM tasks";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            error_log("Error getting all tasks: " . $e->getMessage());
            throw new Exception("Failed to get all tasks: " . $e->getMessage());
        }
    }

    # RequiredKnowledge

    public function addRequiredKnowledge($taskId, $title, $resource) {
        try {
            $query = "INSERT INTO required_knowledge (task_id, title, resource) VALUES (:task_id, :title, :resource)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':resource', $resource, PDO::PARAM_STR);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error adding required knowledge: " . $e->getMessage());
            throw new Exception("Failed to add required knowledge: " . $e->getMessage());
        }
    }

    public function getRequiredKnowledgeByTaskId($taskId) {
        try {
            $query = "SELECT * FROM required_knowledge WHERE task_id = :task_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting required knowledge by task ID: " . $e->getMessage());
            throw new Exception("Failed to get required knowledge by task ID: " . $e->getMessage());
        }
    }

    # Requirements
      
    public function addRequirement($taskId, $title, $resource) {
        try {
            $query = "INSERT INTO requirements (task_id, title, resource) VALUES (:task_id, :title, :resource)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':resource', $resource, PDO::PARAM_STR);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error adding requirement: " . $e->getMessage());
            throw new Exception("Failed to add requirement: " . $e->getMessage());
        }
    }

    public function getRequirementsByTaskId($taskId) {
        try {
            $query = "SELECT * FROM requirements WHERE task_id = :task_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting requirements by task ID: " . $e->getMessage());
            throw new Exception("Failed to get requirements by task ID: " . $e->getMessage());
        }
    }
}
