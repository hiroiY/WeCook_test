<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $search_username = $request->input('search_username');
                    
            if ($search_username) {
                $request->validate([
                    'search_username' => 'required|min:1'
                ]);

                $all_users = $this->user->where('name', 'like', '%'. $search_username . '%')
                                        ->withTrashed()
                                        ->latest()
                                        ->paginate(5);
            } else {
                $all_users = $this->user->withTrashed()->latest()->paginate(5);
            }
            return view('admin.usermanagement', compact('all_users', 'search_username'));
    }
    public function searchUsers(Request $request)
    {
        $request->validate([
            'search_username' => 'required|min:1'
        ]);

        $all_users = $this->user->where('name', 'like', '%'. $request->search_username . '%')
                                ->withTrashed()
                                ->latest()
                                ->paginate(5);

        return view('admin.usermanagement', [
            'all_users' => $all_users,
            'search_username' => $request->search_username,
        ]);
    }
    public function userManagement()
    {
        $users = User::withTrashed()->get();
        return view('admin.usermanagement', [
            'users' => $users
        ]);
    }

    // public function usermanagement(){
    //     return view('admin.usermanagement');
    // }
    public function postmanagement(){
        return view('admin.postmanagement');
    }
    public function userstatus(){                                 
        return view('admin.modal.user_status');                  
    }                                                             
    public function poststatus(){                                 
        return view('admin.modal.post_status');                 
    }

}
