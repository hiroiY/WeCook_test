<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/footer',[App\Http\Controllers\HomeController::class, 'footer'])->name('footer');
Route::get('/homepage',[App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');Route::get('/mypage/myrecipe', [App\Http\Controllers\HomeController::class, 'myrecipe'])->name('myrecipe');
Route::get('/usermanagement', [App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
