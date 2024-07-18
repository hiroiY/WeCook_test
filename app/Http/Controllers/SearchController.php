<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    private $post;
    private $user;

    public function __construct(Post $post, User $user,)    
    {
        $this->post = $post;
        $this->user = $user;
    }

    // Navbar's search feature
   
    private function getAppetizerPosts($page, $perPage , $dishAppetizer = 1 , Request $request)
    {
        //Get the latest posts which dish_id is 1
        // and adde pagination.
        $get_dish_id_1 = $this
                        ->post
                        ->where([['dish_id',  $dishAppetizer],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->paginate($perPage);

        $get_dish_id_1->withPath('/search/appetizer')
                    ->withQueryString();

        return $get_dish_id_1;
    }
    private function getSideDishPosts($page, $perPage, $dishSide = 2, Request $request)
    {
        //Get the latest posts which dish_id is 2
        // and adde pagination.
        $get_dish_id_2 = $this
                        ->post
                        ->where([['dish_id',$dishSide],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->paginate($perPage);


        $get_dish_id_2->withPath('/search/sidedish')->withQueryString();

        return $get_dish_id_2;
    }
    private function getMainDishPosts($page = 1, $perPage = 9, $dishMain = 3, Request $request)
    {
        //Get the latest posts which dish_id is 3
        // and adde pagination.
        $get_dish_id_3 = $this
                        ->post
                        ->where([['dish_id',$dishMain],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->paginate($perPage);

        $get_dish_id_3->withPath('/search/maindish')->withQueryString();

        return $get_dish_id_3;
    }
    private function getDessertPosts($page, $perPage, $dishDessert = 4, Request $request)
    {
        //Get the latest posts which dish_id is 4
        // and adde pagination.
        $get_dish_id_4 = $this
                        ->post
                        ->where([['dish_id',$dishDessert],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->paginate($perPage);

        $get_dish_id_4->withPath('/search/dessert')->withQueryString();

        return $get_dish_id_4;
    }

    public function search(Request $request) 
    {
        //search bar's method
        $search = $request->input('search');
        $recipes = $this->post->where('title','like','%'.$request->search.'%')->get();
        $page = 1;
        $perPage = 9;

        //dish_id
        $dishAppetizer = 1;
        $dishSide = 2;
        $dishMain = 3;
        $dishDessert = 4;

        //Call 
        $appetizer = $this->getAppetizerPosts($page, $perPage, $dishAppetizer, $request);
        $sideDish = $this->getSideDishPosts($page, $perPage, $dishSide, $request);
        $mainDish = $this->getMainDishPosts($page, $perPage, $dishMain, $request);
        $dessert = $this->getDessertPosts($page, $perPage, $dishDessert, $request);

        return view('search.search',compact('recipes','search','appetizer','sideDish','mainDish','dessert'));
    }

}
