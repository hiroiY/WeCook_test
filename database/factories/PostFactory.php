<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $photos = glob(public_path('images/Seeder_photo/*'));
        $photos = array_map(function($path) { 
            return str_replace(public_path(), '', $path); 
        }, $photos);
        // if (empty($photos)) {
        //     echo "No photos found in the specified directory.\n"; 
        // } else {
        //     echo "Photos found: " . implode(', ', $photos) . "\n"; }
        $defaultPhoto = 'appetizer.jpg';
        if (empty($photos)) { 
            $photos = [$defaultPhoto]; 
        }
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'cooking_time' => $this->faker->numberBetween(10, 180), 
            'ingredients' => $this->faker->text(255),
            'photo' => $this->faker->randomElement($photos),
            'description' => $this->faker->paragraph,
            'dish_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}