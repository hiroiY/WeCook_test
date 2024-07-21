<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $table = 'question_answer';
    protected $fillable = ['question_id', 'answer_id'];
    public $timestamps = false;

   public function answer() {
        return $this->belongsTo(Question::class);
   }
   public function question() {
        return $this->belongsTo(Answer::class);
    }
}
