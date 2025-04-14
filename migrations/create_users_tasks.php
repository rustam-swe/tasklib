<?php
require __DIR__ . '/../vendor/autoload.php';

use Core\DB;

$db = DB::connect();

try{
$db->exec("CREATE TABLE IF NOT EXISTS users_tasks(
    user_id INT,
    task_id INT,
    status ENUM('available','inProgress','completed') DEFAULT 'available',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE,
    started_at TIMESTAMP,
    finished_at TIMESTAMP
    )");

    echo "users-tasks jadvali\n";
} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}

