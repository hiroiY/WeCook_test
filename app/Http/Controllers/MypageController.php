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

    private function getPostsByDishId($user_id, $dishId, $page = 1, $perPage = 4)
    {
        // Get the latest posts which match the specified dish_id
        $get_posts = $this->post->where([
            ['dish_id', '=', $dishId],
            ['user_id', '=', $user_id]
        ])->latest()->get();

        // Slices the items displayed on the page.
        $items = $get_posts->slice(($page - 1) * $perPage, $perPage)->all();

        // Create LengthAwarePaginator instance 
        $paginatedItems = new LengthAwarePaginator($items, $get_posts->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        $paginatedItems->withPath("/mypage/myrecipe/$dishId");

        return $paginatedItems;
    }

    public function myrecipe(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login'); // ログインしていない場合、ログインページへリダイレクト
        }

        $page = $request->input('page', 1);
        $appetizer_posts = $this->getPostsByDishId($user->id, 1, $page, 4);
        $maindish_posts = $this->getPostsByDishId($user->id, 2, $page, 4);
        $sidedish_posts = $this->getPostsByDishId($user->id, 3, $page, 4);
        $dessert_posts = $this->getPostsByDishId($user->id, 4, $page, 4);

        // return view('mypage.myrecipe', compact('appetizer_posts', 'maindish_posts', 'sidedish_posts', 'dessert_posts', 'user'));

         // 各ジャンルの投稿数を取得
        $appetizer_count = $this->post->where(['dish_id' => 1, 'user_id' => $user->id])->count();
        $sidedish_count = $this->post->where(['dish_id' => 2, 'user_id' => $user->id])->count();
        $maindish_count = $this->post->where(['dish_id' => 3, 'user_id' => $user->id])->count();
        $dessert_count = $this->post->where(['dish_id' => 4, 'user_id' => $user->id])->count();

        return view('mypage.myrecipe', compact('appetizer_posts', 'maindish_posts', 'sidedish_posts', 'dessert_posts', 'user', 'appetizer_count', 'sidedish_count', 'maindish_count', 'dessert_count'));
        }
}
