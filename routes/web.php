<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Logout modal
// Route::get('/logoutmodal', [HomeController::class, 'logoutmodal']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/usermanagement',[App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement',[App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status',[App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/footer',[App\Http\Controllers\HomeController::class, 'footer'])->name('footer');
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/footer',[App\Http\Controllers\HomeController::class, 'footer'])->name('footer');
Route::get('/mypage/myrecipe', [App\Http\Controllers\HomeController::class, 'myrecipe'])->name('myrecipe');
Route::get('/usermanagement', [App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
