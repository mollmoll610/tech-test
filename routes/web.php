<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/submit', function () {

})->name('submit');


Route::get('/thanks', function () {
    return view('thanks');
})->name('success');
