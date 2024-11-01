<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usermanagement(){
        return view('admin.usermanagement');
    }
    public function postmanagement(){
        return view('admin.postmanagement');
    }
=======
use App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function search_username(Request $request){
        $search_username = $request->input('search_username');

        // for counting the result
        $total_results = User::where('name', 'like', '%'. $search_username . '%')
        ->withTrashed()
        ->count();

        $searched_username = User::where('name', 'like', '%'. $search_username . '%')
        ->withTrashed()
        ->latest()
        ->paginate(10);

        // for pagination
        $searched_username->appends(['search_username' => $search_username]);

        return view ('admin.search_user', compact('searched_username', 'search_username', 'total_results')) ;
    }
    public function search_post(Request $request){
        $search_post = $request->input('search_post');

        $total_results = Post::where('title', 'like', '%'. $search_post . '%')
        ->withTrashed()
        ->count();

        $searched_post = Post::where('title', 'like', '%'. $search_post . '%')
        ->withTrashed()
        ->latest()
        ->paginate(10);

        // for pagination
        $searched_post->appends(['search_post' => $search_post]);

        return view('admin.search_post', compact('searched_post', 'search_post', 'total_results'));
    }


    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->role_id === 1) {
            $all_users = User::with('posts')->withTrashed()->latest()->paginate(10);
            return view('admin.usermanagement', compact('all_users'));
        } else {
            return redirect('/')->with('error', 'Access denied');
        }
    }
    public function deactivate($id)
    {
        $this->user->destroy($id);
        return redirect()->back();
    }

    public function activate($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }
    public function postmanagement()
    {
        if (Auth::check() && Auth::user()->role_id === 1) {
        $all_posts = Post::withTrashed()->latest()->paginate(10);
            return view('admin.postmanagement', compact('all_posts'));
        }else {
            return redirect('/')->with('error', 'Access denied');
        }
    }
    public function activatePost($id)
    {
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function deactivatePost(Request $request, $id)
    {
        $this->post->destroy($id);
        return redirect()->back();
    }


>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    public function userstatus(){                                 
        return view('admin.modal.user_status');                  
    }                                                             
    public function poststatus(){                                 
        return view('admin.modal.post_status');                 
    }
<<<<<<< HEAD
=======
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
}
