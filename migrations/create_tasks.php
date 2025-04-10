<?php
require __DIR__ . '/../vendor/autoload.php';
use Core\DB;

$db = DB::connect();

try{
$db->exec("CREATE TABLE IF NOT EXISTS tasks(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR (128) NOT NULL,
    description VARCHAR (128) NOT NULL,
    active BOOL DEFAULT false,
    status ENUM ('published', 'drafted') DEFAULT 'drafted',
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
    )");

    echo "tasks jadvali\n";

} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}
