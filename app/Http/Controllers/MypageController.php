<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

// paginate用
use Illuminate\Pagination\LengthAwarePaginator;

class MypageController extends Controller
{
    private $comment;
    private $post;
    private $user;
    private $bookmark;

    public function __construct(Comment $comment, Post $post, User $user, Bookmark $bookmark) {
        $this->comment = $comment;
        $this->post = $post;
        $this->user = $user;
        $this->bookmark = $bookmark;
    }

    // dishID=1(appetizer)がほしいとき
    // $user_id => loginしている人のuser_idを入れる★
    private function getAppetizerPosts($page = 1, $perPage = 4, $dishAppetizer = 1, $user_id = 1)
    {
        // $user = getUsersPost($id);
        //Get the latest posts which dish_id is 1
        $get_dish_id_1 = $this->post->where([['dish_id', '=', $dishAppetizer],['user_id', '=', $user_id]])->latest()->get();
        //$get_dish_id_1 = $this->post->where('dish_id',$dishAppetizer)->latest()->get();
       //Get 30 posts from last
       //$appetizerPosts = $get_dish_id_1->take(30)->get();
       //Slices the items displayed on the appetizer page.
        $appetizerItems = $get_dish_id_1->slice(($page - 1) * $perPage, $perPage)->all();
        //Create LengthAwarePaginator instance 
       $appetizerPaginatedItems = new LengthAwarePaginator($appetizerItems, $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
       $appetizerPaginatedItems->withPath('/mypage/myrecipe/appetizer');
        return $appetizerPaginatedItems;
    }

    public function myrecipe(Request $request, $user_id)
    {
        $page = $request->input('page', 1);
        $user = $this->user->findOrFail($user_id);
        //dish_id
        $dishAppetizer = 1;
        $appetizer_posts = $this->getAppetizerPosts($page,4,$dishAppetizer,$user_id);

        return view('mypage.myrecipe', compact('appetizer_posts', 'user'));
    }
}
