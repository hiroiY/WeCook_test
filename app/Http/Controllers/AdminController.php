<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function search_username(Request $request){
        $search_username = $request->input('search_username');
        $searched_username = User::where('name', 'like', '%'. $search_username . '%')
        ->withTrashed()
        ->latest()
        ->paginate(10);
        return view ('admin.search_user', compact('searched_username')) ;
    }
    public function search_post(Request $request){
        $search_post = $request->input('search_post');
        $searched_post = Post::where('title', 'like', '%'. $search_post . '%')
        ->withTrashed()
        ->latest()
        ->paginate(10);
        return view ('admin.search_post', compact('searched_post')) ;
    }


    public function index(Request $request)
    {
            $all_users = User::withTrashed()->latest()->paginate(10);
        return view('admin.usermanagement', compact('all_users'));
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
        $all_posts = Post::withTrashed()->latest()->paginate(10);
        return view('admin.postmanagement', compact('all_posts'));
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





    // public function postmanagement(){
    //     return view('admin.postmanagement');
    // }
    public function userstatus(){                                 
        return view('admin.modal.user_status');                  
    }                                                             
    public function poststatus(){                                 
        return view('admin.modal.post_status');                 
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }


}
