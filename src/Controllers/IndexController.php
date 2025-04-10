<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController {

  // public function home() {
    
  //   require_once __DIR__ . '/../../resource/views/task.php';
  // }
  

  public function indexTask() {
    require_once __DIR__ . '/../../resource/views/task.php';
  }
  
  public function home() {
    $tasks = (new \App\Models\Task())->all();
    require_once __DIR__ . '/../../resource/views/home.php';
  }

  public function register() {
    require_once __DIR__ . '/../../resource/views/register.php';
  }

  public function SendLogin(){
    require_once __DIR__ . '/../../resource/views/login.php';
  }
  public function SendRegister(){
    require_once __DIR__ . '/../../resource/views/register.php';

  }
}
