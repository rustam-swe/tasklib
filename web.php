<?php

use App\Controllers\IndexController;
use App\Routes\Route;

Route::get("/", [IndexController::class, 'index']);
Route::get("/home", [IndexController::class, 'home']);