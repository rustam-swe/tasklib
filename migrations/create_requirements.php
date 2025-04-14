<?php
require __DIR__ . '/../vendor/autoload.php';

use Core\DB;

$db = DB::connect();

try{
$db->exec("CREATE TABLE IF NOT EXISTS requirements(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128),
    resource VARCHAR(128),
    task_id INT,
    FOREIGN KEY (task_id) REFERENCES tasks(id) ON DELETE CASCADE
    )");
    echo "requirements yaratildi\n";
} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}
