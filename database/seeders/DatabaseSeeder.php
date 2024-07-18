<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        // $this->call([
        //     // UserPostSeeder::class,
        //     DishSeeder::class,
        // ]);

        User::factory(30)->create()->each(function ($user) {
            Post::factory(rand(3, 20))->create(['user_id' => $user->id]);
        });
        
        $this->call([
            BookmarkSeeder::class,
            CommentsSeeder::class,
        ]);
    }
}