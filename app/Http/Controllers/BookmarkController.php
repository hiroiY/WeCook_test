<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class BookmarkController extends Controller
{
    public function toggle($post_id)
    {
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)->where('post_id', $post_id)->first();

        if ($bookmark) {
            Bookmark::where('user_id', $user->id) ->where('post_id', $post_id) ->delete();
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'post_id' => $post_id,
            ]);
        }

        return redirect()->back();
    }
}
