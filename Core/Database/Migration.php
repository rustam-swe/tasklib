<?php
declare(strict_types=1);

namespace Core\Database;
use Core\DB;
use \PDO;

class Migration {
  public const FOLDER = '/migrations';
  public PDO $db;

  public static function checkForMigrationsTable(){
    $query = 'SELECT EXISTS (SELECT 1 FROM migrations LIMIT 1);';
    $stmt = self::$db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    return !empty($result);
  }

  public static function migrateServiceTables($root){
    self::migrate($root, true);
  }


  public static function migrate(string $root, bool|null $service = false){
    if(!self::checkForMigrationsTable()) {
      self::migrateServiceTables($root); // migrations, users
    }

    $migratedMigrations = self::getMigratedMigrations(); // ['create_users_table', 'create_tasks_table'];

    $path = $root . ($service ? self::SERVICE_FOLDER : self::FOLDER);

    $migrations = array_diff(scandir($path), ['.','..']);

    $newMigrations = array_diff($migratedMigrations, $migrations);

    foreach($newMigrations as $migration){
      require "$path/{$migration}";
    }
  }
}