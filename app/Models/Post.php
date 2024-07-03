<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->belongsTo(Dish::class);
    }
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
