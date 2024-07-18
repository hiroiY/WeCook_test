<?php
namespace App\Http\Controllers;

// use DB;
use Illuminate\Support\Facades\DB;
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
        $sidedish_posts = $this->getPostsByDishId($user->id, 2, $page, 4);
        $maindish_posts = $this->getPostsByDishId($user->id, 3, $page, 4);
        $dessert_posts = $this->getPostsByDishId($user->id, 4, $page, 4);

        // 各投稿のコメント数とブックマーク数を取得
        $post_counts = [];
        foreach ([$appetizer_posts, $maindish_posts, $sidedish_posts, $dessert_posts] as $posts) {
            foreach ($posts as $post) {
                $post_counts[$post->id] = [
                    'comments' => Comment::where('post_id', $post->id)->count(),
                    'bookmarks' => Bookmark::where('post_id', $post->id)->count(),
                ];
            }
        }

        // 各ジャンルの投稿数を取得
        $appetizer_count = $this->post->where(['dish_id' => 1, 'user_id' => $user->id])->count();
        $sidedish_count = $this->post->where(['dish_id' => 2, 'user_id' => $user->id])->count();
        $maindish_count = $this->post->where(['dish_id' => 3, 'user_id' => $user->id])->count();
        $dessert_count = $this->post->where(['dish_id' => 4, 'user_id' => $user->id])->count();

        return view('mypage.myrecipe', compact('appetizer_posts', 'maindish_posts', 'sidedish_posts', 'dessert_posts', 'user', 'appetizer_count', 'sidedish_count', 'maindish_count', 'dessert_count', 'post_counts'));
    }


    public function mybookmark(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login'); // ログインしていない場合、ログインページへリダイレクト
        }

        $page = $request->input('page', 1);
        $bookmarkedPostIds = Bookmark::where('user_id', $user->id)->pluck('post_id');

        $appetizer_posts = Post::whereIn('id', $bookmarkedPostIds)->where('dish_id', 1)->paginate(4, ['*'], $page);
        $sidedish_posts = Post::whereIn('id', $bookmarkedPostIds)->where('dish_id', 2)->paginate(4, ['*'], $page);
        $maindish_posts = Post::whereIn('id', $bookmarkedPostIds)->where('dish_id', 3)->paginate(4, ['*'], $page);
        $dessert_posts = Post::whereIn('id', $bookmarkedPostIds)->where('dish_id', 4)->paginate(4, ['*'], $page);

        $appetizer_count = Bookmark::whereHas('post', function($query) {
            $query->where('dish_id', 1);
        })->where('user_id', $user->id)->count();

        $sidedish_count = Bookmark::whereHas('post', function($query) {
            $query->where('dish_id', 2);
        })->where('user_id', $user->id)->count();

        $maindish_count = Bookmark::whereHas('post', function($query) {
            $query->where('dish_id', 3);
        })->where('user_id', $user->id)->count();

        $dessert_count = Bookmark::whereHas('post', function($query) {
            $query->where('dish_id', 4);
        })->where('user_id', $user->id)->count();

        // ログインユーザーがブックマークしている投稿を取得
        $bookmarkedPosts = Post::whereIn('id', function($query) use ($user) {
        $query->select('post_id')
              ->from('bookmarks')
              ->where('user_id', $user->id);
        })->get();

        $bookmark_counts = [];
        $bookmarkedPostCounts = Bookmark::select('post_id', DB::raw('COUNT(*) as count'))
            ->groupBy('post_id')
            ->get();

            foreach ($bookmarkedPostCounts as $count) {
                $bookmark_counts[$count->post_id] = $count->count;
            }

        return view('mypage.mybookmark', compact('appetizer_posts', 'maindish_posts', 'sidedish_posts', 'dessert_posts', 'user', 'appetizer_count', 'sidedish_count', 'maindish_count', 'dessert_count', 'bookmarkedPosts', 'bookmark_counts'));
    }

}