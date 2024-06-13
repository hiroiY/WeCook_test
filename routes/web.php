<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usermanagement', [App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/footer', [App\Http\Controllers\HomeController::class, 'footer'])->name('footer');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mypage2'])->name('mybookmark');
