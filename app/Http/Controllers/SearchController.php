<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    private $post;
    private $user;

    public function __construct(Post $post, User $user)    
    {
        $this->post = $post;
        $this->user = $user;
    }

    // Navbar's search feature
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

    private function getAppetizerPosts($page = 1, $perPage = 9, $dishAppetizer = 1, Request $request)
    {
        //Get the latest posts which dish_id is 1
       $get_dish_id_1 = $this
                        ->post
                        ->where([['dish_id',  $dishAppetizer],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->get();
    
       //Slices the items displayed on the appetizer page.
        $appetizerItems = $get_dish_id_1
                        ->slice(($page - 1) * $perPage, $perPage)
                        ->all();

        //Create LengthAwarePaginator instance 
       $appetizerPaginatedItems = new LengthAwarePaginator($appetizerItems,count( $get_dish_id_1) , $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $appetizerPaginatedItems->withPath('/search/appetizer');

        return $appetizerPaginatedItems;
    }
    private function getSideDishPosts($page = 1, $perPage = 9, $dishSide = 2, Request $request)
    {
        //Get the latest posts which dish_id is 1
       $get_dish_id_2 = $this
                        ->post
                        ->where([['dish_id',$dishSide],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->get();

       //Slices the items displayed on the appetizer page.
        $sideDishItems = $get_dish_id_2
                        ->slice(($page - 1) * $perPage, $perPage)
                        ->all();

        //Create LengthAwarePaginator instance 
       $sideDishPaginatedItems = new LengthAwarePaginator($sideDishItems, count( $get_dish_id_2), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $sideDishPaginatedItems->withPath('search/sidedish');

        return $sideDishPaginatedItems;
    }
    private function getMainDishPosts($page = 1, $perPage = 9, $dishMain = 3, Request $request)
    {
        //Get the latest posts which dish_id is 1
       $get_dish_id_3 = $this
                        ->post
                        ->where([['dish_id',$dishMain],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->get();

       //Slices the items displayed on the appetizer page.
        $mainDishItems = $get_dish_id_3->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
       $mainDishPaginatedItems = new LengthAwarePaginator($mainDishItems,count( $get_dish_id_3), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $mainDishPaginatedItems->withPath('search/maindish');

        return $mainDishPaginatedItems;
    }
    private function getDessertPosts($page = 1, $perPage = 9, $dishDessert = 4, Request $request)
    {
        //Get the latest posts which dish_id is 1
       $get_dish_id_4 = $this
                        ->post
                        ->where([['dish_id',$dishDessert],['title','like','%'.$request->search.'%']])
                        ->latest()
                        ->get();

       //Slices the items displayed on the appetizer page.
        $dessertItems = $get_dish_id_4->slice(($page - 1) * $perPage, $perPage)->all();

        //Create LengthAwarePaginator instance 
       $dessertPaginatedItems = new LengthAwarePaginator($dessertItems, count( $get_dish_id_4), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

       $dessertPaginatedItems->withPath('search/dessert');

        return $dessertPaginatedItems;
    }
}
