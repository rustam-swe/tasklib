<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {
  public function index(){
      dd([1,2,3]);
  }

  public function home(){
   echo 'home page';
  }
}
