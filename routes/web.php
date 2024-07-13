<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookmarkController;


Auth::routes();
// require __DIR__ . '/auth.php';

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
//Homepage's Routes
Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index')->name('home');
    Route::get('/home/recently','index');
    Route::get('/home/appetizer', 'index');
    Route::get('/home/sidedish','index');
    Route::get('/home/maindish', 'index');
    Route::get('/home/dessert', 'index');
});

Route::get('/postmanagement', [App\Http\Controllers\AdminController::class, 'postmanagement'])->name('postmanagement');
Route::get('/user-status', [App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status', [App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/mypage/myrecipe/{id}', [App\Http\Controllers\MypageController::class, 'myrecipe'])->name('myrecipe');
Route::get('/mypage/myrecipe/appetizer', [App\Http\Controllers\MypageController::class, 'appetizer'])->name('appetizer');
Route::get('/mypage/mybookmark', [App\Http\Controllers\HomeController::class, 'mybookmark'])->name('mybookmark');

Route::get('/myrecipe/{id}/edit', [RecipeController::class, 'editMyRecipe'])->name('editmyrecipe');
Route::patch('/myrecipe/{id}/update', [RecipeController::class, 'updateMyRecipe'])->name('updatemyrecipe');
Route::delete('/myrecipe/{id}/delete', [App\Http\Controllers\RecipeController::class, 'deleteMyRecipe'])->name('deleteMyRecipe');

//Writers page
Route::controller(WriterController::class)->group(function() {
    Route::get('/{post_id}/writer/{user_id}', 'writer')->name('writer');
    Route::get('/{post_id}/writer/{user_id}/recently', 'writer');
    Route::get('/{post_id}/writer/{user_id}/appetizer', 'writer');
    Route::get('/{post_id}/writer/{user_id}/sidedish', 'writer');
    Route::get('/{post_id}/writer/{user_id}/maindish', 'writer');
    Route::get('/{post_id}/writer/{user_id}/dessert', 'writer');
});

// Bookmark
Route::middleware('auth')->group(function () {
    Route::get('bookmark/toggle/{post_id}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});
// Navbar's search Route
Route::controller(SearchController::class)->group(function() {
    Route::get('/search', 'search')->name('search');
    Route::get('/search/appetizer', 'search');
    Route::get('/search/sidedish', 'search');
    Route::get('/search/maindish', 'search');
    Route::get('/search/dessert', 'search');
});


//Recipe Routes 
// createrecipe
    Route::get('/createrecipe', [RecipeController::class, 'createrecipe'])->name('createrecipe');
    Route::post('/storerecipe', [RecipeController::class, 'storeRecipe'])->name('storerecipe');
    Route::get('/detailrecipe/{post_id}/{user_id}', [RecipeController::class, 'detailrecipe'])->name('detailrecipe');


// Admin
Route::get('/mypage/profile_edit', [App\Http\Controllers\HomeController::class, 'profile_edit'])->name('profile_edit');
Route::get('/user-status', [App\Http\Controllers\AdminController::class, 'userstatus'])->name('userstatus');
Route::get('/post-status', [App\Http\Controllers\AdminController::class, 'poststatus'])->name('poststatus');
Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/users/search', [AdminController::class, 'search_username'])->name('admin.users.search');
Route::get('/admin/posts/search', [AdminController::class, 'search_post'])->name('admin.posts.search');
Route::get('/admin/usermanagement', [AdminController::class, 'index'])->name('usermanagement');
Route::get('/admin/postmanagement', [AdminController::class, 'postmanagement'])->name('postmanagement');
Route::patch('/admin/usermanagement/{id}/activate', [AdminController::class, 'activate'])->name('activate');
Route::delete('/admin/usermanagement/{id}/deactivate', [AdminController::class, 'deactivate'])->name('deactivate');
Route::patch('/admin/postmanagement/{id}/activate', [AdminController::class, 'activatePost'])->name('post.activate');
Route::delete('/admin/postmanagement/{id}/deactivate', [AdminController::class, 'deactivatePost'])->name('post.deactivate');


