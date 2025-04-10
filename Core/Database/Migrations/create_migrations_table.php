<?php
require "vendor/autoload.php";
use Core\DB;

$db = DB::connect();

try{
$db->exec("CREATE TABLE migrations(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR (128) NOT NULL
    )");
} catch(PDOException $e){
    die("Xatolik: " . $e->getMessage());
}
