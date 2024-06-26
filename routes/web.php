<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('homepage.homepage');
});
Auth::routes();
// require __DIR__ . '/auth.php';
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/recently', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/appetizer', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home/sidedish', [App\Http\Controllers\HomeController::class, 'index']);


// Logout modal
// Route::get('/logoutmodal', [HomeController::class, 'logoutmodal']);
Route::get('/mypage/profile_edit', [App\Http\Controllers\HomeController::class, 'profile_edit'])->name('profile_edit');
Route::get('/usermanagement', [App\Http\Controllers\AdminController::class, 'usermanagement'])->name('usermanagement');
Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status', [App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status', [App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/mypage/myrecipe', [App\Http\Controllers\HomeController::class, 'myrecipe'])->name('myrecipe');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mypage2'])->name('mybookmark');
Route::get('/editmyrecipe', [App\Http\Controllers\RecipeController::class, 'editmyrecipe'])->name('editmyrecipe');
Route::get('/delete-recipe', [App\Http\Controllers\RecipeController::class, 'deleterecipe'])->name('deleterecipe');

//Writers page
Route::get('/{id}/writer',[UserController::class, 'writer'])->name('writer');
Route::get('/{id}/writer/recently',[UserController::class, 'writer']);

Route::get('/search',[HomeController::class, 'search'])->name('search');

Route::get('/createrecipe',[App\Http\Controllers\RecipeController::class,'createrecipe']);

Route::get('/detailrecipe/{id}',[App\Http\Controllers\RecipeController::class,'detailrecipe'])->name('detailrecipe');
