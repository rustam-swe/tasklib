<?php

use App\Controllers\IndexController;
use App\Routes\Route;

Route::get("/", [IndexController::class, 'index']);
Route::get('/register', [IndexController::class, 'register']);
Route::post("/home", [IndexController::class, 'home']);
