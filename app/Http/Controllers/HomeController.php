<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;



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
    private function getRecentlyPosts($page = 1, $perPage = 9)
    {
        //Get latest 30 posts 
        $home_posts = $this->post->take(30)->get();
     
        //Slicing appeared post on the current page
        $recentlyPageItems = $home_posts->slice(($page - 1) * $perPage,$perPage)->all();

        // Create LengthAwarePaginator instance 
        $recentlyPaginatedItems = new LengthAwarePaginator( $recentlyPageItems, count($home_posts),$perPage, $page,['path' => LengthAwarePaginator::resolveCurrentPath(),]);

        return $recentlyPaginatedItems;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $recently_posts = $this->getRecentlyPosts($page);

        return view('homepage.homepage', compact('recently_posts'));
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
