<?php
declare(strict_types=1);

require "vendor/autoload.php";
<<<<<<< Updated upstream
=======

 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();

 $task = new \App\Models\Task();

 var_dump($task->all());

 exit;
>>>>>>> Stashed changes
require "web.php";

$src = new \App\src();
$src->run();
