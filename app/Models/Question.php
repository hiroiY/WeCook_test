<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
    public function post()
    {
        return $this->belongsTo(Post::class)->withTrashed();
    }
    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }
    public function answer($id) 
    {
        return $this->answers()->where('question_id', $id)->first();
    }
}
