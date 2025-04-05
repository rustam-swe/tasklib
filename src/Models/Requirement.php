<?php
require __DIR__ . "/../../db.php";

class Requirement {
    public \PDO $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting requirements by task ID: " . $e->getMessage());
            throw new Exception("Failed to get requirements by task ID: " . $e->getMessage());
        }
    }
}
