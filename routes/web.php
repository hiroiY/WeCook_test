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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MypageController;

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

//My page
Route::controller(MypageController::class)->group(function() {
    Route::get('/mypage/{id}/myrecipe', 'myrecipe')->name('myrecipe');
    Route::get('/mypage/myrecipe/appetizer', 'appetizer')->name('appetizer');
    Route::get('/mypage/{id}/mybookmark', 'mybookmark')->name('mybookmark');
});

//Writers page
Route::controller(WriterController::class)->group(function() 
{
    Route::get('/{post_id}/writer/{user_id}', 'writer')->name('writer');
    Route::get('/{post_id}/writer/{user_id}/recently', 'writer');
    Route::get('/{post_id}/writer/{user_id}/appetizer', 'writer');
    Route::get('/{post_id}/writer/{user_id}/sidedish', 'writer');
    Route::get('/{post_id}/writer/{user_id}/maindish', 'writer');
    Route::get('/{post_id}/writer/{user_id}/dessert', 'writer');
});

// Bookmark
Route::middleware('auth')->group(function () 
{
    Route::get('bookmark/toggle/{post_id}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});
// Navbar's search Route
Route::controller(SearchController::class)->group(function() 
{
    Route::get('/search', 'search')->name('search');
    Route::get('/search/appetizer', 'search');
    Route::get('/search/sidedish', 'search');
    Route::get('/search/maindish', 'search');
    Route::get('/search/dessert', 'search');
});

//Recipe Routes 

Route::controller(RecipeController::class)->group(function() 
{
    // Recipe-Create/Detail/Delete
    Route::get('/createrecipe','createrecipe')->name('createrecipe');
    Route::post('/storerecipe','storeRecipe')->name('storerecipe');
    Route::get('/detailrecipe/{post_id}/{user_id}','detailrecipe')->name('detailrecipe');
    Route::get('/delete-recipe', 'deleterecipe')->name('deleterecipe');
    //Edit My recipe
    Route::get('/myrecipe/{id}/edit','editMyRecipe')->name('editmyrecipe');
    Route::patch('/myrecipe/{id}/update','updateMyRecipe')->name('updatemyrecipe');
    Route::delete('/myrecipe/{id}/delete', 'deleteMyRecipe')->name('deleteMyRecipe');
});

    // Store the Comment
    Route::controller(CommentController::class)->group(function() 
    {
    Route::post('/recipe/{post_id}/comment/store', 'storeComment')->name('store.comment');
    Route::patch('/recipe/{id}/comment/update','update')->name('update.comment');
    Route::delete('/recipe/{id}/comment/delete','delete')->name('delete.comment');
    });

// Admin
Route::controller(AdminController::class)->group(function() 
{
    //User management
    Route::get('/admin/users', 'index')->name('admin.users');
    Route::get('/admin/usermanagement','index')->name('usermanagement');
    Route::get('/user-status', 'userstatus')->name('userstatus');
    Route::patch('/admin/usermanagement/{id}/activate','activate')->name('activate');
    Route::delete('/admin/usermanagement/{id}/deactivate','deactivate')->name('deactivate');
    //Post management

    Route::get('/postmanagement','postmanagement')->name('postmanagement');
    Route::get('/admin/postmanagement','postmanagement')->name('postmanagement');
    Route::get('/post-status','poststatus')->name('poststatus');
    Route::patch('/admin/postmanagement/{id}/activate','activatePost')->name('post.activate');
    Route::delete('/admin/postmanagement/{id}/deactivate','deactivatePost')->name('post.deactivate');
    //admin search 
    
    Route::get('/admin/users/search','search_username')->name('admin.users.search');
    Route::get('/admin/posts/search', 'search_post')->name('admin.posts.search');
});

//My page Profile
Route::get('/mypage/profile_edit/{id}', [ProfileController::class, 'profile_edit'])->name('profile_edit');
Route::patch('/mypage/profile_update/{id}', [ProfileController::class, 'profile_update'])->name('profile_update');
