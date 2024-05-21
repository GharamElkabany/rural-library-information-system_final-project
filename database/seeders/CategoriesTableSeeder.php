<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Novel'],
            ['name' => 'Religion'],
            ['name' => 'Academic'],
            ['name' => 'Children'],
            ['name' => 'General Reading'],
        ]);

        Category::factory()->count(10)->create();
    }
}
