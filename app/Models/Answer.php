<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function post()
    {
        return $this->belongsTo(Post::class)->withTrashed();
    }
    public function question() 
    {
        return $this->belongsTo(Question::class);
    }
}
