<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Supervisor;

class SupervisorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supervisors')->insert([
            'name' => 'John Supervisor',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password123')
        ]);

        Supervisor::factory()->count(10)->create();
    }
}
