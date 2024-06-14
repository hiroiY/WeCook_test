<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // die('aa');
        return view('homepage.homepage');
    }

    public function admin(){
        return view('admin');
    }

    public function footer(){
        return view('layouts.footer');
    }

    public function homepage(){
        return view('homepage.homepage');
    }
    
    public function myrecipe()
    {
        return view('myrecipe');
    }

    public function mypage()
    {
        return view('mypage');
    }
    public function mypage2()
    {
        return view('mybookmark');
    }
}
