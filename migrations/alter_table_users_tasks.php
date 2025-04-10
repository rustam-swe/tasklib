<?php
require __DIR__ . '/../vendor/autoload.php';

use Core\DB;

$db = DB::connect();
try {
    $db->exec("ALTER TABLE users_tasks MODIFY status ENUM('inProgress','completed') DEFAULT 'inProgress'");
    echo "Jadval yana muvaffaqiyatli yangilandi.\n";
} catch (PDOException $e) {
    die("Xatolik: " . $e->getMessage());
}
