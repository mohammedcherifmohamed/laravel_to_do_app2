<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController ;


Route::get('/', [TaskController::class , 'index'])->name('home');

Route::get('/login', [AuthController::class , "Login"])->name("Login");

Route::get('/register', [AuthController::class , "Register"])->name("register");

Route::post('/registerPost', [AuthController::class , "RegisterPost"])->name("register.post");

Route::post('/loginPost', [AuthController::class , "LoginPost"])->name('Login.post');

Route::post("/tasks",[TaskController::class , 'addTask'])->name('tasks.store');

Route::delete("/tasks/{id}",[TaskController::class , 'deleteTask'])->name('tasks.destroy');

Route::patch("/tasks/complete/{id}",[TaskController::class , 'toggleCompete'])->name('tasks.toggle');



