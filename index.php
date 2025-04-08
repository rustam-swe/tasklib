<?php
declare(strict_types=1);

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$task = new \App\Models\TaskModel();

var_dump($task->all());


require "web.php";

$src = new \App\src();
$src->run();
