<?php
declare(strict_types=1);

namespace Core;

require "vendor/autoload.php";

 $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
 $dotenv->load();
 
 use \PDO;
use \PDOException;

class DB {
    public static function connect(){
        try {
            $db = new PDO("mysql:host={$_ENV['DB_HOST']}; dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
        );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            return $db;
        } catch (PDOException $e) {
            exit("Unable to connect to database: " . $e->getMessage());
        }
    }
}
