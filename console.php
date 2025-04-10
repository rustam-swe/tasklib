<?php
declare(strict_types=1);

require "Core/Database/Migration.php";

$commands = [
  'migration:migrate'
];

if(!isset($argv[1])){
  $errorText ='Argument kiritish talab etiladi' . PHP_EOL;
  $errorText .= "Mana bu buyruqlardan birini kiritish mumkin: ". PHP_EOL;
 
  echo $errorText . implode(PHP_EOL, $commands) . PHP_EOL;

  return;
}

$command = $argv[1];

$argumentMissingError = function(string $command) use ($commands) {
  if(!in_array($command, $commands)){
    $errorText = "$command buyrug'i mavjud emas." . PHP_EOL;
    $errorText .= "Mana bu buyruqlardan birini kiritish mumkin: ". PHP_EOL;
    
    echo $errorText . implode(PHP_EOL, $commands) . PHP_EOL;
  }
};

match($command) {
  'migrate' => \Core\Database\Migration::migrate(__DIR__),
  default => $argumentMissingError($command)
};

/**
 * TODO:
 * 1. 
