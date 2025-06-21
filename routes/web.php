<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class , "Login"])->name("Login");

Route::get('/register', [AuthController::class , "Register"])->name("register");

Route::get('/loginPost', [AuthController::class , "LoginPost"])->name('Login.post');