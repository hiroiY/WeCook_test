<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        // $all_users = User::paginate(10);
        $search_username = $request->input('search_username');
        
        if ($search_username) {
            $request->validate([
                'search_username' => 'required|min:1'
            ]);
    
            $all_users = User::where('name', 'like', '%'. $search_username . '%')
                            ->withTrashed()
                            ->latest()
                            ->paginate(10);
        } else {
            $all_users = User::withTrashed()->latest()->paginate(10);
        }
        return view('admin.usermanagement', compact('all_users', 'search_username'));
    }
    public function deactivate($id)
    {
        $this->user->destroy($id);
        return redirect()->back();
    }

    public function activate(Request $request, $id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }



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
