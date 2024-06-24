<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class dishSeeder extends Seeder
{
    private $dish;

    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            [
                'name' => 'Appetizer',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Side dish',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Main dish',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->dish->insert($dishes);
    }
}