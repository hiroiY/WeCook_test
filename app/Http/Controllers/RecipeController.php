<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function createrecipe(){
        return view ('recipe.createrecipe');
    }

    public function detailrecipe(){
        return view ('recipe.detailrecipe');
    }
    
    public function editmyrecipe()
    {
        return view('editmyrecipe');
    }
    
    public function deleterecipe()
    {
        return view('delete_recipe');
    }
}


