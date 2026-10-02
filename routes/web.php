<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'create'])->name('home');

Route::post('/submit', [UserController::class, 'store'])->name('submit');

Route::get('/thanks', [UserController::class, 'thanks'])->name('success');
