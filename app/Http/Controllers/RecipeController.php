<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function createrecipe(){
        return view ('recipe.createrecipe');
    }
}
