<?php

use App\Controllers\IndexController;
use App\Controllers\AuthController;
use App\Routes\Route;

Route::get("/home/task", [IndexController::class, 'indexTask']);
Route::get("/login", [IndexController::class, 'SendLogin']);
Route::get('/register', [IndexController::class, 'SendRegister']);
Route::get("/home", [IndexController::class, 'home']);
Route::get("/", [IndexController::class, 'SendLogin']);
Route::post("/check", [AuthController::class, 'CheckLogin']);
Route::post("/create", [AuthController::class, 'CreateRegister']);