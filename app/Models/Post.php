<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Post;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'photo',
        'dish_id',
        'title',
        'times',
        'ingredients',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id'); 
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->withoutTrashed();
    }
    public function getCommentCountAttribute()
    {
        return $this->comments()->count();
    }
    public function index()
{
    $posts = Post::withTrashed()->get();
    return view('posts.index', compact('posts'));
}
    //     return $this->belongsTo(Dish::class);
    // }
    // detailrecipe pege
        public function getCategoryLabelAttribute()
    {
        $categories = [
            'appetizer' => 'Appetizer',
            'side_dish' => 'Side dish',
            'main_dish' => 'Main dish',
            'dessert' => 'Dessert'
        ];

        return $categories[strtolower($this->category)] ?? $this->category;
    }

  
}
