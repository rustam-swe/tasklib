<?php

use App\Controllers\IndexController;
use App\Routes\Route;

<<<<<<< Updated upstream
Route::get("/", [IndexController::class, 'index']);
Route::get("/home", [IndexController::class, 'home']);
=======
// method, path, action

Route::get("/", [IndexController::class, 'home']);
Route::get("/tasks/{id}", [\App\Controllers\Task::class, 'show']);
Route::delete("/tasks/{id}", [\App\Controllers\Task::class, 'delete']);

Route::get("/login", [IndexController::class, 'SendLogin']);
Route::get('/register', [IndexController::class, 'SendRegister']);
Route::post("/check", [AuthController::class, 'CheckLogin']);
Route::post("/create", [AuthController::class, 'CreateRegister']);
>>>>>>> Stashed changes
