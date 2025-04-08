<?php
declare(strict_types=1);

require "vendor/autoload.php";

 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();

 $task = new \App\Models\Task();
// echo "<pre>";
// var_dump($task->all());
// echo "</pre>";
// exit;

require "web.php";

$src = new \App\src();

$src->run();


