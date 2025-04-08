<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {
  
  public function home() {
    
    require_once __DIR__ . '/../../resource/views/task.php';
  }
  
}

