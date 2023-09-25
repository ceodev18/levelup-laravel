<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('articles')->insert([
                'title' => "Article Title $i",
                'content' => "Content of Article $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}