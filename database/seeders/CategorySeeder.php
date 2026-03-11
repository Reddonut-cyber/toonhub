<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Shonen',
            'Shojo',
            'Seinen',
            'Josei',
            'Kodomo',
            'Action',
            'Adventure',
            'Comedy',
            'Drama',
            'Romance',
            'Sci-Fi',
            'Fantasy',
            'Horror',
            'Mystery',
            'Slice of Life',
            'Isekai',
            'Murim',
            'Mecha',
            'LitRPG',
            'System',
            'Cyberpunk',
            'Psychological',
            'Sports',
            'Historical',
            'Western Comic',
            'Manga',
            'Manhwa',
            'Manhua',
            'Graphic Novel',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['name' => $category],
                ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            );
        }
    }
}
