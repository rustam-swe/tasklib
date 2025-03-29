<?php
require "vendor/autoload.php";

$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $db = new PDO("mysql:host={$_ENV['DB_HOST']}; dbname={$_ENV['DB_NAME']}",
    $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
);


    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Unable to connect to database: " . $e->getMessage());
}
