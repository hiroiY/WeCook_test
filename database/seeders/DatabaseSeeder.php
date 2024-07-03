<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CommentsSeeder::class,
        ]);

        $this->call([
            BookmarkSeeder::class,
            DishSeeder::class,
        ]);
        
        User::factory(30)->create()->each(function ($user) {
            Post::factory(rand(3, 20))->create(['user_id' => $user->id]);
        });
    }
}