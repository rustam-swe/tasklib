<?php
declare(strict_types=1);

namespace Core\Database;

class Migration {
  public const FOLDER = '/migrations';

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


  public static function checkForMigrationsTable(){
    $db = self::getDatabaseConnection();
    $db->query('show tables like migrations');
  }

  private static function getDatabaseConnection() {
    // Replace the following line with your actual database connection logic
    return new \PDO('mysql:host=localhost;dbname=test', 'username', 'password');
  }

  public static function migrateServiceTables($root){
    self::migrate($root, true);
  }
}
