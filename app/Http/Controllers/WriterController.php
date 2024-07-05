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

    private function getWritersPosts ($page = 1, $perPage = 9, $post_id,$user_id) 
    {
        //search the user and get user's latest 30 posts.
        $writers_posts = $this->post->findOrFail($post_id)
                        ->take(30)->get();
        
        $writersRecentlyItems = $writers_posts->slice(($page - 1) * $perPage,$perPage)->all();
        $writersPaginatedItem = new LengthAwarePaginator($writersRecentlyItems,count($writers_posts),$perPage,$page,['path' => LengthAwarePaginator::resolveCurrentPath()]);

        //Replace the placeholders
        $writer_id = $user_id;
        $writer_post_id = $post_id;
        $path = '/{post_id}/writer/{user_id}/recently';
        $post_id_path = str_replace('{post_id}',$writer_post_id,$path);
        $writer_id_path = str_replace('{user_id}',$writer_id,$post_id_path);

        $writersPaginatedItem->withPath($writer_id_path);

        return $writersPaginatedItem; 
    }

    public function writer(Request $request, $post_id,$user_id) {
        $writer = $this->user->findOrFail($user_id);
        $previous_post =  $this->post->findOrFail($post_id);
        $page = $request->input('page',1);
        $perPage = $request->input('perPage',9);
        //dish_id
        $Appetizer = 1;
        $writer_recently = $this->getWritersPosts($page,$perPage,$post_id,$user_id);

        return view('writers.writer',compact('writer','previous_post','writer_recently'));
    }
}

    private function getAppetizerPosts ($page = 1, $perPage = 9, $dishID = 1, $post_id, $user_id) 
    {
        
        $appetizer_posts = Post::where('user_id', $user_id)
                            ->whereHas('dish_id', function ($query) use ($dishID){
                                $query->where('dish_id', $dishID);
                            })
                            ->paginate($perPage);
                        //Replace the placeholders
                        $writer_id = $user_id;
                        $writer_post_id = $post_id;
                        $path = '/{post_id}/writer/{user_id}/appetizer';
                        $post_id_path = str_replace('{post_id}',$writer_post_id,$path);
                        $writer_id_path = str_replace('{user_id}',$writer_id,$post_id_path);
                
                        $appetizer_posts->withPath($writer_id_path);
                
        return $appetizer_posts;
    }
    private function getSidedishPosts ($page = 1, $perPage = 9, $dishID = 2, $id) 
    {
        $sidedish_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->paginate($perPage);
                            
        // $sidedishRecentlyItems = $sidedish_posts
        //                         ->slice(($page - 1) * $perPage,$perPage)->all();
        // $sidedishPaginatedItem = new LengthAwarePaginator($sidedishRecentlyItems,count($sidedish_posts),
        //                         $perPage,$page,[
        //                             'path' => LengthAwarePaginator::resolveCurrentPath()
        //                         ]);

        // $sidedishPaginatedItem->withPath('writer/{id}/sidedish');

        return $sidedish_posts;
    }
    private function getMaindishPosts ($page = 1, $perPage = 9, $dishID = 3, $id) 
    {
        $maindish_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->paginate($perPage);
                            
        // $maindishRecentlyItems = $maindish_posts
        //                         ->slice(($page - 1) * $perPage,$perPage)->all();
        // $maindishPaginatedItem = new LengthAwarePaginator($maindishRecentlyItems,count($maindish_posts),
        //                         $perPage,$page,[
        //                             'path' => LengthAwarePaginator::resolveCurrentPath()
        //                         ]);

        // $maindishPaginatedItem->withPath('writer/{id}/dish');

        return $maindish_posts;
    }
    private function getDessertPosts ($page = 1, $perPage = 9, $dishID = 4, $id) 
    {
        $dessert_posts = Post::where('user_id', $id)
                            ->whereHas('dish', function ($query) use ($dishID){
                                $query->where('id', $dishID);
                            })
                            ->paginate($perPage);
                            
        // $dessertRecentlyItems = $dessert_posts
        //                         ->slice(($page - 1) * $perPage,$perPage)->all();
        // $dessertPaginatedItem = new LengthAwarePaginator($dessertRecentlyItems,count($dessert_posts),
        //                         $perPage,$page,[
        //                             'path' => LengthAwarePaginator::resolveCurrentPath()
        //                         ]);

        // $dessertPaginatedItem->withPath('writer/{id}/dish');

        return $dessert_posts;
    }

    public function writer(Request $request, $id) {
        $writer = $this->user->findOrFail($id);
        $page = $request->input('page',1);
        $perPage = 9;
        // $perPage = $request->input('perPage',9);
        // $dishID = 1;
        // $dishID = 2;
        // $dishID = 3;
        // $dishID = 4;

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
                    'dessert_count',
                ));
    }
    
}
