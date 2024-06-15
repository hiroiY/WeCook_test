<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller

{

    public function deleterecipe()
    {
        return view('delete_recipe');
    }

}
