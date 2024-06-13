<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usermanagement(){
        return view('admin.usermanagement');
    }
    public function postmanagement(){
        return view('admin.postmanagement');
    }
        
}
