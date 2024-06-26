<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function myrecipe()
    {
        // dammy data
        // $recipes = [
        //     ['id' => 1, 'title' => 'Tomato Rice', 'comments' => 11, 'bookmarks' => 40, 'image' => 'tomato_rice.jpg'],
        //     ['id' => 2, 'title' => 'Cappuccino', 'comments' => 11, 'bookmarks' => 40, 'image' => 'cappuccino.jpg'],
        //     ['id' => 3, 'title' => 'Chicken Curry', 'comments' => 11, 'bookmarks' => 40, 'image' => 'chicken_curry.jpg'],
        //     ['id' => 4, 'title' => 'Berry Berry', 'comments' => 11, 'bookmarks' => 40, 'image' => 'berry_berry.jpg'],
        // ];
        return view('mypage.myrecipe');
    }
}
