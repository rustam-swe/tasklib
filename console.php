<?php
declare(strict_types=1);

require "Core/Database/Migration.php";

$command = $argv[1];

match($command) {
  'migrate' => \Core\Database\Migration::migrate(__DIR__)
};
