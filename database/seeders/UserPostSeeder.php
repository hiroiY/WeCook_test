<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\User; 
use App\Models\Post;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('posts')->delete();
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::factory(30)->create()->each(function ($user) {
            $postCount = rand(3, 30); 
            Post::factory($postCount)->create(['user_id' => $user->id]); 
            });
    }
}
