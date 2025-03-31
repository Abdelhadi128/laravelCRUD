<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',[UserController::class, 'create'])->name('create');

Route::post('/create/signup', [UserController::class, 'store'])->name('create.signup');

Route::get('/show', [UserController::class, 'show'])->name('show');
