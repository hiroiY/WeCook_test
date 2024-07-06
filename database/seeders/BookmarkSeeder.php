<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Modelの読み込み
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookmarkSeeder extends Seeder
{
    public function run()
    {
        // Get all user ids and post ids from respective tables
        $userIds = DB::table('users')->pluck('id');
        $postIds = DB::table('posts')->pluck('id');
        // Generate bookmarks data
        $bookmarks = [];
        foreach ($userIds as $userId) {
            // Generate random number of bookmarks for each user (between 1 to 3)
            $numberOfBookmarks = rand(1, 3);
            // Shuffle post ids to randomly assign bookmarks
            $shuffledPostIds = $postIds->shuffle();
            for ($i = 0; $i < $numberOfBookmarks; $i++) {
                $bookmarks[] = [
                    'user_id' => $userId,
                    'post_id' => $shuffledPostIds[$i], // Assign random post ids
                ];
            }
        }
        // Insert data into the bookmarks table
        DB::table('bookmarks')->insert($bookmarks);
    }
}
