<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'publisher_name' => 'Charles Scribner\'s Sons',
            'published_year' => '1925',
            'category_id' => 1  // Assuming '1' is the ID for Novels
        ]);

        Book::factory()->count(10)->create();
    }
}