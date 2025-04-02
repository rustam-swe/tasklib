<?php
require __DIR__ . "/../../db.php";

class R_Knowledge {
    public \PDO $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting required knowledge by task ID: " . $e->getMessage());
            throw new Exception("Failed to get required knowledge by task ID: " . $e->getMessage());
        }
    }
    
}
