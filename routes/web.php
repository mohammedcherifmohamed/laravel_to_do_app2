<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class , "Login"])->name("Login");

Route::get('/register', [AuthController::class , "Register"])->name("register");

Route::post('/registerPost', [AuthController::class , "RegisterPost"])->name("register.post");

Route::post('/loginPost', [AuthController::class , "LoginPost"])->name('Login.post');



