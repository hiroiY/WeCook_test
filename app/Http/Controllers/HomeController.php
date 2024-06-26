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
        $this->middleware('auth');
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

        $recentlyPaginatedItems->withPath('/home/recently');

        return $recentlyPaginatedItems;
    }

    private function getAppetizerPosts($page = 1, $perPage = 9, $dishAppetizer = 1)
    {
        //Get the latest posts which dish_id is 1
       $get_dish_id_1 = $this->post->where('dish_id',$dishAppetizer)->latest();

       //Get 30 posts from last
       $appetizerPosts = $get_dish_id_1->take(30)->get();

       //Slices the items displayed on the appetizer page.
        $appetizerItems = $appetizerPosts->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
       $appetizerPaginatedItems = new LengthAwarePaginator($appetizerItems,count($appetizerPosts), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $appetizerPaginatedItems->withPath('/home/appetizer');

        return $appetizerPaginatedItems;
    }

    private function getSidedishPosts($page = 1, $perPage = 9, $dishSide = 2)
    {
        //Get the latest posts which dish_id is 2
       $get_dish_id_2 = $this->post->where('dish_id',$dishSide)->latest();

       //Get 30 posts from last
       $sideDishPosts = $get_dish_id_2->take(30)->get();

       //Slices the items displayed on the side dish page.
        $sideDishItems = $sideDishPosts->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
       $sideDishPaginatedItems = new LengthAwarePaginator($sideDishItems,count($sideDishPosts), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $sideDishPaginatedItems->withPath('/home/sidedish');

        return $sideDishPaginatedItems;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        //dish_id
        $dishAppetizer = 1;
        $dishSide = 2;

        $recently_posts = $this->getRecentlyPosts($page);
        $appetizer_posts = $this->getAppetizerPosts($page,9,$dishAppetizer);
        $sideDish_posts =  $this->getSidedishPosts($page, 9, $dishSide);

        return view('homepage.homepage', compact('recently_posts','appetizer_posts','sideDish_posts'));
    }
    public function admin()
    {
        return view('admin');
    }
    public function mypage()
    {
        return view('mypage');
    }
    public function mybookmark()
    {
        return view('mypage.mybookmark');
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
