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
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage.homepage');
    }

    public function admin()
    {
        return view('admin');
    }
    public function mypage()
    {
        return view('mypage');
    }
    public function mypage2()
    {
        return view('mybookmark');
    }
    public function footer()
    {
        return view('layouts.footer');
    }

    public function myrecipe()
    {
        return view('myrecipe');
    }
    public function search() 
    {
        return view('search.search');
    }
}
