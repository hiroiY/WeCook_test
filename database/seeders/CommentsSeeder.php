<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Modelの読み込み
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        // Get all post ids from the posts table
        $postIds = DB::table('posts')->pluck('id');
        // Generate comments data
        $comments = [];
        foreach ($postIds as $postId) {
            // Generate random number of comments for each post (between 1 to 5)
            $numberOfComments = rand(1, 5);
            for ($i = 0; $i < $numberOfComments; $i++) {
                $comments[] = [
                    'user_id' => rand(1, 10), // Adjust as per your user ids
                    'post_id' => $postId,
                    'body' => $this->generateRandomComment(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        // Insert data into the comments table
        DB::table('comments')->insert($comments);
    }
    private function generateRandomComment()
    {
        // Array of sample comments
        $sampleComments = [
            'Great post!',
            'Very informative.',
            'I like this.',
            'Nice work!',
            'Interesting read.',
            'Thanks for sharing.',
            'Well written.',
        ];
        // Return a random comment from the sample comments array
        return $sampleComments[array_rand($sampleComments)];
    }
}
