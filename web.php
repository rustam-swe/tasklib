<?php

use App\Controllers\IndexController;
use App\Controllers\AuthController;
use App\Routes\Route;

Route::get("/", [AuthController::class, 'SendLogin']);
Route::post("/login", [AuthController::class, 'CheckLogin']);
Route::get("/task", [IndexController::class , "home"]);
