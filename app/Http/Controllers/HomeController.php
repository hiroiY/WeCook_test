<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $post;
     private $user;

    public function __construct(Post $post, User $user)    
    {
        // $this->middleware('auth');
        $this->post = $post;
        $this->user = $user;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function getRecentlyPosts()
    {
        $home_posts = $this->post->get();
        $recently_posts = [] ;

        foreach($home_posts as $post)
        {
            $recently_posts[] = $post;
        }

        return  $recently_posts;
    }

    public function index()
    {
        $recently_posts = $this->getRecentlyPosts();
        return view('homepage.homepage')
                ->with('recently_posts', $recently_posts);
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
    public function myrecipe()
    {
        return view('mypage.myrecipe');
    }



    public function search() 
    {
        return view('search.search');
    }
    public function profile_edit()
    {
        return view('profile_edit');
    }
}
