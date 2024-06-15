<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/createrecipe',[App\Http\Controllers\RecipeController::class,'createrecipe']);

Route::get('/detailrecipe',[App\Http\Controllers\RecipeController::class,'detailrecipe']);
