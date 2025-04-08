<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {
  public function index() {
    require_once __DIR__ . '/../../resource/views/login.php';
  }
  
  public function home() {
    $tasks = (new \App\Models\Task())->all();
    require_once __DIR__ . '/../../resource/views/home.php';
  }

  public function register() {
    require_once __DIR__ . '/../../resource/views/register.php';
  }
}

