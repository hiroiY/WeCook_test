<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
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
