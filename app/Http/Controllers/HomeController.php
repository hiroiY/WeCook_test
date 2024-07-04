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
        // $this->middleware('auth')->except('index');
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //Get posts method on Homepage
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

    //Get Appetizer latest posts
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

    //Get Side dish latest posts
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

    //Get Main dish latest posts
    private function getMaindishPosts($page = 1, $perPage = 9, $dishMain = 3)
    {
        //Get the latest posts which dish_id is 3
       $get_dish_id_3 = $this->post->where('dish_id',$dishMain)->latest();

       //Get 30 posts from last
       $mainDishPosts = $get_dish_id_3->take(30)->get();

       //Slices the items displayed on the main dish page.
        $mainDishItems = $mainDishPosts->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
       $mainDishPaginatedItems = new LengthAwarePaginator($mainDishItems,count($mainDishPosts), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $mainDishPaginatedItems->withPath('/home/maindish');

        return $mainDishPaginatedItems;
    }

    //Get Dessert latest posts
    private function getDessertPosts($page = 1, $perPage = 9, $dishDessert = 4)
    {
        //Get the latest posts which dish_id is 4
        $get_dish_id_4 = $this->post->where('dish_id',$dishDessert)->latest();

        //Get 30 posts from last
        $dessertPosts = $get_dish_id_4->take(30)->get();

        //Slices the items displayed on the dessert page.
        $dessertItems = $dessertPosts->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
        $dssertPaginatedItems = new LengthAwarePaginator($dessertItems,count($dessertPosts), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        $dssertPaginatedItems->withPath('/home/dessert');

        return $dssertPaginatedItems;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        //dish_id
        $dishAppetizer = 1;
        $dishSide = 2;
        $dishMain = 3;
        $dishDessert = 4;

        $recently_posts = $this->getRecentlyPosts($page);
        $appetizer_posts = $this->getAppetizerPosts($page,9,$dishAppetizer);
        $sideDish_posts = $this->getSidedishPosts($page, 9, $dishSide);
        $mainDish_posts = $this->getMaindishPosts($page, 9, $dishMain);
        $dessert_posts = $this->getDessertPosts($page, 9, $dishDessert);

        return view('homepage.homepage', compact('recently_posts','appetizer_posts','sideDish_posts','mainDish_posts','dessert_posts'));
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
    public function profile_edit()
    {
        return view('profile_edit');
    }
}
