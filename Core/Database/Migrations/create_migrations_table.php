<?php

require "vendor/autoload.php";

use Core\DB;

$db = DB::connect();

try {
    $db->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "migrations jadvali yaratildi.\n";

} catch (PDOException $e) {
    die("Xatolik: " . $e->getMessage());
}
