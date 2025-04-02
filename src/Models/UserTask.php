<?php
require __DIR__ . "/../../db.php";

class UserTask {
    public \PDO $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function addUserTask($userId, $taskId, $status = 'available', $startedAt = null, $finishedAt = null) {
        try {
            $query = "INSERT INTO users_tasks (user_id, task_id, status, started_at, finished_at) 
                      VALUES (:user_id, :task_id, :status, :started_at, :finished_at)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':started_at', $startedAt); // Can be null
            $stmt->bindParam(':finished_at', $finishedAt); // Can be null
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error adding user task: " . $e->getMessage());
            throw new Exception("Failed to add user task: " . $e->getMessage());
        }
    }

    public function getUserTasks($userId) {
        try {
            $query = "SELECT * FROM users_tasks WHERE user_id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting user tasks: " . $e->getMessage());
            throw new Exception("Failed to get user tasks: " . $e->getMessage());
        }
    }
}
