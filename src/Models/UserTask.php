<?php
declare(strict_types=1);

namespace App\Models;

use \Core\DB;
use \PDO;
use \PDOException;
use \Exception;

class UserTask {
    public PDO $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    public function addUserTask($userId, $taskId, $startedAt, $finishedAt = null, $status = 'inProgress') {
        try {
            $query = "INSERT INTO users_tasks (user_id, task_id, started_at, finished_at, status) 
                      VALUES (:user_id, :task_id, :started_at, :finished_at, :status)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':task_id', $taskId, PDO::PARAM_INT);
            $stmt->bindParam(':started_at', $startedAt); 
            $stmt->bindParam(':finished_at', $finishedAt); 
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error adding user task: " . $e->getMessage());
            throw new Exception("Failed to add user task: " . $e->getMessage());
        }
    }

    public function findUserTask($userId) {
        try {
            $query = "SELECT * FROM users_tasks WHERE user_id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error getting user tasks: " . $e->getMessage());
            throw new Exception("Failed to get user tasks: " . $e->getMessage());
        }
    }

    public function finishUserTask($userId) {
        try {
            $query = "UPDATE users_tasks SET finished_at = :finished_at WHERE user_id = :user_id;";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':finished_at', $finishedAt); 
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error getting user tasks: " . $e->getMessage());
            throw new Exception("Failed to get user tasks: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM users_tasks WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting user tasks: " . $e->getMessage());
            throw new Exception("Failed to delete user: " . $e->getMessage());
        }
    }
}