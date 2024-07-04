<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Modelの読み込み
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $comment;

    public function __construct(Comment $comment) {
        $this->comment = $comment;
    }

    public function run(): void
    {
        $comments = [
            [
                'user_id' => 1,
                'post_id' => 1,
                'body' => 'A',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'user_id' => 2,
                'post_id' => 2,
                'body' => 'A',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'user_id' => 1,
                'post_id' => 3,
                'body' => 'A',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'user_id' => 2,
                'post_id' => 4,
                'body' => 'A',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        $this->comment->insert($comments);
    }
}
