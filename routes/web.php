<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// require __DIR__ . '/auth.php';

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Logout modal
// Route::get('/logoutmodal', [HomeController::class, 'logoutmodal']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mypage/profile_edit', [App\Http\Controllers\HomeController::class, 'profile_edit'])->name('profile_edit');
Route::get('/usermanagement', [App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status', [App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status', [App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/mypage/myrecipe', [App\Http\Controllers\HomeController::class, 'myrecipe'])->name('myrecipe');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mypage2'])->name('mybookmark');
Route::get('/editmyrecipe', [App\Http\Controllers\RecipeController::class, 'editmyrecipe'])->name('editmyrecipe');
Route::get('/delete-recipe', [App\Http\Controllers\RecipeController::class, 'deleterecipe'])->name('deleterecipe');
Route::get('/recipe/writer',[UserController::class, 'writer'])->name('writer');
Route::get('/search',[HomeController::class, 'search'])->name('search');

Route::get('/createrecipe',[App\Http\Controllers\RecipeController::class,'createrecipe']);

Route::get('/detailrecipe',[App\Http\Controllers\RecipeController::class,'detailrecipe']);
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users/search', [AdminController::class, 'searchUsers'])->name('admin.users.search');
Route::get('/admin/usermanagement', [AdminController::class, 'userManagement'])->name('admin.usermanagement');
