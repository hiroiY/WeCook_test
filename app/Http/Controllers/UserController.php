<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function writer() {
        return view('writers.writer');
=======
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
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
    }
}
