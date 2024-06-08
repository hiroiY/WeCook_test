<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/footer',[App\Http\Controllers\HomeController::class, 'footer'])->name('footer');