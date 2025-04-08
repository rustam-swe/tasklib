<?php

use App\Controllers\IndexController;
use App\Routes\Route;

Route::get("/home/task", [IndexController::class, 'index']);
Route::get("/home", [IndexController::class, 'home']);