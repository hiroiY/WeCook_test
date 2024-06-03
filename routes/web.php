<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/usermanagement',[App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement',[App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status',[App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status',[App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/footer',[App\Http\Controllers\HomeController::class, 'footer'])->name('footer');
Route::get('/homepage',[App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

// Route::('/home', [HomeController::class, 'index])->name('home');
// Route::('/mypage', [HomeController::class, 'mypage])->name('mypage');
