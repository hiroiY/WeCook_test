<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function dish()
    {
        return $this->hasOne(Dish::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // bookmark全体を取得
    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    // 自分のpostがbookmarkされている
    // Mybookmarkで使用★　$post->isBookmarked()
    public function isBookmarked() 
    {
        return $this->bookmark()->where('user_id', Auth::user()->id)->exists();
    }
}
