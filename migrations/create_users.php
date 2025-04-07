<?php

require "vendor/autoload.php";

use Core\DB;

$db = DB::connect();

try{
$db->exec("CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (128) NOT NULL,
    email VARCHAR (128) NOT NULL UNIQUE,
    role ENUM('user','admin') DEFAULT 'user',
    password VARCHAR (128) NOT NULL
    )");
    
    echo "users jadvali\n";

} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}
