<?php
declare(strict_types=1);

namespace Core\Database;

class Migration {
  public const FOLDER = '/migrations';

  public static function migrate(string $root){
    // TODO:
    // 1. Check if migrations table exist
    //  1.1. If not then create one
    // 2. Get migrated migrations
    // 3. Migrate if not migrated
    //
    
    $path = $root . self::FOLDER;

    $migrations = array_diff(scandir($path), ['.','..']);

    foreach($migrations as $migration){
      require "$path/{$migration}";
    }
  }
}
