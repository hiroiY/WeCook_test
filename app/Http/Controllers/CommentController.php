<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $user;
    private $post;
    private $comment;

    public function __construct(User $user, Post $post, Comment $comment) 
    {
        $this->user = $user;
        $this->post = $post;
        $this->comment = $comment;
    }

    public function storeComment(Request $request, $id) 
    {
        $request->validate([
            'comment' => 'required|min:1|max:300'
        ]);

       $this->post->findOrFail($id);

        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $id;
        $this->comment->body = $request->comment;

        $this->comment->save();

        return redirect()->back();
    }

    public function delete($id) 
    {
       $this->comment->destroy($id);

       return redirect()->back();
    }
}