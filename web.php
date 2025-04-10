<?php

use App\Controllers\IndexController;
use App\Controllers\AuthController;
use App\Routes\Route;

Route::get("/", [IndexController::class, 'home']);
Route::get("/tasks/{id}", [Task::class, 'show']);

Route::get("/login", [IndexController::class, 'SendLogin']);
Route::get('/register', [IndexController::class, 'SendRegister']);
Route::post("/check", [AuthController::class, 'CheckLogin']);
Route::post("/create", [AuthController::class, 'CreateRegister']);
