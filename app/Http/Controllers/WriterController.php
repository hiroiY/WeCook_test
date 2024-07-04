<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class WriterController extends Controller
{
    
    private $user;
    private $post;

    public function __construct(User $user, Post $post)    
    {
        $this->user = $user;
        $this->post = $post;
    }

    private function getWritersPosts ($page = 1, $perPage = 9, $id) 
    {
        $writers_posts = Post::where('user_id', $id)->firstOrFail()->take(30)->get();
        $writersRecentlyItems = $writers_posts
                                ->slice(($page - 1) * $perPage,$perPage)->all();
        $writersPaginatedItem = new LengthAwarePaginator($writersRecentlyItems,count($writers_posts),
                                $perPage,$page,[
                                    'path' => LengthAwarePaginator::resolveCurrentPath()
                                ]);

        $writersPaginatedItem->withPath('writer/{id}/recently');

        return $writersPaginatedItem;
    }
    private function getAppetizerPosts ($page = 1, $perPage = 9, $dishID = 1, $id) 
    {
        $appetizer_posts = Post::where('user_id', $id)
                            // ->firstOrFail()->take(30)->get();
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->get();
                            
        $appetizerRecentlyItems = $appetizer_posts
                                ->slice(($page - 1) * $perPage,$perPage)->all();
        $appetizerPaginatedItem = new LengthAwarePaginator($appetizerRecentlyItems,count($appetizer_posts),
                                $perPage,$page,[
                                    'path' => LengthAwarePaginator::resolveCurrentPath()
                                ]);

        $appetizerPaginatedItem->withPath('writer/{id}/appetizer');

        return $appetizerPaginatedItem;
    }
    private function getSidedishPosts ($page = 1, $perPage = 9, $dishID = 2, $id) 
    {
        $sidedish_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->get();
                            
        $sidedishRecentlyItems = $sidedish_posts
                                ->slice(($page - 1) * $perPage,$perPage)->all();
        $sidedishPaginatedItem = new LengthAwarePaginator($sidedishRecentlyItems,count($sidedish_posts),
                                $perPage,$page,[
                                    'path' => LengthAwarePaginator::resolveCurrentPath()
                                ]);

        $sidedishPaginatedItem->withPath('writer/{id}/sidedish');

        return $sidedishPaginatedItem;
    }
    private function getMaindishPosts ($page = 1, $perPage = 9, $dishID = 3, $id) 
    {
        $maindish_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->get();
                            
        $maindishRecentlyItems = $maindish_posts
                                ->slice(($page - 1) * $perPage,$perPage)->all();
        $maindishPaginatedItem = new LengthAwarePaginator($maindishRecentlyItems,count($maindish_posts),
                                $perPage,$page,[
                                    'path' => LengthAwarePaginator::resolveCurrentPath()
                                ]);

        $maindishPaginatedItem->withPath('writer/{id}/dish');

        return $maindishPaginatedItem;
    }
    private function getDessertPosts ($page = 1, $perPage = 9, $dishID = 4, $id) 
    {
        $dessert_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->get();
                            
        $dessertRecentlyItems = $dessert_posts
                                ->slice(($page - 1) * $perPage,$perPage)->all();
        $dessertPaginatedItem = new LengthAwarePaginator($dessertRecentlyItems,count($dessert_posts),
                                $perPage,$page,[
                                    'path' => LengthAwarePaginator::resolveCurrentPath()
                                ]);

        $dessertPaginatedItem->withPath('writer/{id}/dish');

        return $dessertPaginatedItem;
    }

    public function writer(Request $request, $id) {
        $writer = $this->user->findOrFail($id);
        $page = $request->input('page',1);
        $perPage = $request->input('perPage',9);
        $dishID = 1;
        $dishID = 2;
        $dishID = 3;
        $dishID = 4;

        $writer_recently = $this->getWritersPosts($page,$perPage,$id);
        $writer_appetizer = $this->getAppetizerPosts($page, $perPage, $dishID = 1, $id);
        $writer_sidedish = $this->getSidedishPosts($page, $perPage, $dishID = 2, $id);
        $writer_maindish = $this->getMaindishPosts($page, $perPage, $dishID = 3, $id);
        $writer_dessert = $this->getDessertPosts($page, $perPage, $dishID = 4, $id);

        $appetizer_count = Post::where('user_id', $id)
                                ->whereHas('dish', function ($query) {
                                    $query->where('id', 1); 
                                })
                                ->count();
        
        $sidedish_count = Post::where('user_id', $id)
                                ->whereHas('dish', function ($query) {
                                    $query->where('id', 2); 
                                })
                                ->count();

        $maindish_count = Post::where('user_id', $id)
                                ->whereHas('dish', function ($query) {
                                    $query->where('id', 3); 
                                })
                                ->count();

        $dessert_count = Post::where('user_id', $id)
                                ->whereHas('dish', function ($query) {
                                    $query->where('id', 4); 
                                })
                                ->count();

        return view('writers.writer',compact(
                    'writer',
                    'writer_recently', 
                    'writer_appetizer',
                    'writer_sidedish',
                    'writer_maindish',
                    'writer_dessert',
                    'appetizer_count',
                    'sidedish_count',
                    'maindish_count',
                    'dessert_count'
                ));
    }
    
}
