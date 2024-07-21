<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
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
    public function answer() {
        return $this->hasOne(Question::class);
   }
}
