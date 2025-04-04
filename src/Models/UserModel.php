<?php
namespace App\Models;

class UserModel {
    public \PDO $db;

    public function __construct() {
        $this->db = \App\Models\DB::connect();
    }

    public function addUser($name, $email, $password, $role = 'user') {
        try {
            $query = "INSERT INTO users (name, email, role, password) VALUES (:name, :email, :role, :password)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error adding user: " . $e->getMessage());
            throw new \Exception("Failed to add user: " . $e->getMessage());
        }
    }

    public function deleteUser($id) {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            throw new \Exception("Failed to delete user: " . $e->getMessage());
        }
    }

     public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    # UserTask

    public function addUserTask($userId, $taskId, $status = 'available', $startedAt = null, $finishedAt = null) { # Boshida finishedAt ga qiymat berilmidi
        try {                                                                                                           # addUserTask metodining status parametriga available berilmaydi
            $query = "INSERT INTO users_tasks (user_id, task_id, status, started_at, finished_at) 
                      VALUES (:user_id, :task_id, :status, :started_at, :finished_at)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
            $stmt->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, \PDO::PARAM_STR);
            $stmt->bindParam(':started_at', $startedAt); 
            $stmt->bindParam(':finished_at', $finishedAt); 
            $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error adding user task: " . $e->getMessage());
            throw new \Exception("Failed to add user task: " . $e->getMessage());
        }
    }

    public function getUserTasks($userId) {
        try {
            $query = "SELECT * FROM users_tasks WHERE user_id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Error getting user tasks: " . $e->getMessage());
            throw new \Exception("Failed to get user tasks: " . $e->getMessage());
        }
    }

    # Finish_UserTask degan funksiya yaratish kerak

}