<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {
  public function index(){
    var_dump($_GET);
    echo 'test mana';
  }

  public function home(){
   require __DIR__ . '/../../resource/vievs/home.php';
  }
}