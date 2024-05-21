<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Volunteer;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('volunteers')->insert([
            'name' => 'Jane Volunteer',
            'email' => 'volunteer@example.com',
            'password' => Hash::make('password123')
        ]);

        Volunteer::factory()->count(10)->create();
    }
}
