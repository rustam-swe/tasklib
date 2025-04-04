<?php
require "vendor/autoload.php";

use App\Models\DB;

$db = DB::connect();

try {
    $db->exec("ALTER TABLE tasks MODIFY difficulty ENUM('easy', 'medium', 'hard') NOT NULL");

    $db->exec("ALTER TABLE tasks ADD deadline INT");

    echo "Jadval muvaffaqiyatli yangilandi.\n";
} catch (PDOException $e) {
    die("Xatolik: " . $e->getMessage());
}
