<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mypage2'])->name('mybookmark');
