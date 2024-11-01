<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
=======
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $this->call([
            // UserPostSeeder::class,
            DishSeeder::class,
        ]);

        User::factory(30)->create()->each(function ($user) {
            Post::factory(rand(3, 20))->create(['user_id' => $user->id]);
        });
        
        $this->call([
            BookmarkSeeder::class,
            CommentsSeeder::class,
        ]);
    }
}
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
