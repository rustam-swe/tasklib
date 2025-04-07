<?php
require "vendor/autoload.php";

use App\Models\DB;

$db = DB::connect();
try {
    $db->exec("ALTER TABLE users_tasks MODIFY status ENUM('inProgress','completed') DEFAULT 'inProgress'");
    echo "Jadval yana muvaffaqiyatli yangilandi.\n";
} catch (PDOException $e) {
    die("Xatolik: " . $e->getMessage());
}