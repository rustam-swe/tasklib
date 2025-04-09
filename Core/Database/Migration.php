<?php
declare(strict_types=1);

namespace Core\Database;

use PDO;

class Migration {
  public const FOLDER = '/migrations';
  public const SERVICE_FOLDER = '/services/migrations'; 

  protected static PDO $db; 

  public static function setDb(PDO $pdo): void {
    self::$db = $pdo;
  }

  public static function migrate(string $root, bool $service = false): void {
    if (!self::checkForMigrationsTable()) {
      self::migrateServiceTables($root); 
    }

    $migratedMigrations = self::getMigratedMigrations(); 

    $path = $root . ($service ? self::SERVICE_FOLDER : self::FOLDER);
    $migrations = array_diff(scandir($path), ['.', '..']);

    $newMigrations = array_diff($migrations, $migratedMigrations);

    foreach ($newMigrations as $migration) {
      require "$path/{$migration}";
    }
  }

  public static function checkForMigrationsTable(): bool {
    $stmt = self::$db->query("SHOW TABLES LIKE 'migrations'");
    return $stmt && $stmt->rowCount() > 0;
  }

  public static function getMigratedMigrations(): array {
    $stmt = self::$db->query("SELECT migration FROM migrations");
    return $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];
  }

  public static function migrateServiceTables(string $root): void {
    self::migrate($root, true);
  }
}
