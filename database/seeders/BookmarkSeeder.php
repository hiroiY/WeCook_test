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
    /**
     * Run the database seeds.
     */
    private $bookmark;

    public function __construct(Bookmark $bookmark) {
        $this->bookmark = $bookmark;
    }

    public function run(): void
    {
        $bookmarks = [
            [
                'user_id' => 1,
                'post_id' => 1,
            ], [
                'user_id' => 2,
                'post_id' => 2,
            ]
        ];
        $this->bookmark->insert($bookmarks);
    }
}
