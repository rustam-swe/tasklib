<?php
declare(strict_types=1);

namespace Core\Database;

class Migration {
  public const FOLDER = '/migrations';

  public static function migrate(string $root, bool|null $service = false){
    if(!self::checkForMigrationsTable()) {
      $this->migrateServiceTables($root); // migrations, users
    }

    $migratedMigrations = $this->getMigratedMigrations(); // ['create_users_table', 'create_tasks_table'];

    $path = $root . ($service ? self::SERVICE_FOLDER : self::FOLDER);

    $migrations = array_diff(scandir($path), ['.','..']);

    $newMigrations = array_diff($migratedMigrations, $migrations)

    foreach($newMigrations as $migration){
      require "$path/{$migration}";
    }
  }


  public static function checkForMigrationsTable(){
    $db->query('show tables like migrations');
  }

  public function migrateServiceTables($root){
    $this->migrate($root, true);
  }
}
