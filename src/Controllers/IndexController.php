<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {

  public function index() {
    require_once __DIR__ . '/../../resource/views/login.php';
  }
  
  public function home() {
    $task = (new \App\Models\Task())->find(1);
    require_once __DIR__ . '/../../resource/views/task.php';
  }
  
  public function register() {
    require_once __DIR__ . '/../../resource/views/register.php';
  }
}

