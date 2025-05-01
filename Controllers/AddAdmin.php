<?php

declare(strict_types=1);

#namespace App\Controllers;

class AddAdmin {

   public function __construct(){
    if(empty($_SERVER['REQUEST_METHOD'] === 'POST')){

      return "Incorrect information";
    }
    $this->loginUser();

  }

  public function loginUser(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    return ;
  
  }

}
