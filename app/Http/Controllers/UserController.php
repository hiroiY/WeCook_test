<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
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
        $writers_posts = $this->post->findOrFail($id)->
        take(30)->get();
        $writersRecentlyItems = $writers_posts->slice(($page - 1) * $perPage,$perPage)->all();
        $writersPaginatedItem = new LengthAwarePaginator($writersRecentlyItems,count($writers_posts),$perPage,$page,['path' => LengthAwarePaginator::resolveCurrentPath()]);

        $writersPaginatedItem->withPath('recently');

        return $writersPaginatedItem;
    }

    public function writer(Request $request, $id) {
        $writer = $this->user->findOrFail($id);
        $page = $request->input('page',1);
        $perPage = $request->input('perPage',9);

        $writer_recently = $this->getWritersPosts($page,$perPage,$id);

        return view('writers.writer',compact('writer','writer_recently'));
    }
}
