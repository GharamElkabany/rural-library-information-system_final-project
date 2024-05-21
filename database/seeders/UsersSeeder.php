<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert using eloquent
        User::create([ 
        'name' => 'Bahar', 
        'email' => 'SW01081496@student.uniten.edu.my', 
        'password' => bcrypt('password123')
        ]);
       
        //insert DB
        DB::table('users')->insert(['name' => 'Admin','email' => 'admin@uniten.edu.my','password' => bcrypt('password123'), 'userLevel'=>'1', 'userType'=>'Administrator']);

        //insert multiple
        $users =[
            ['name' => 'user1', 'email' => 'user1@uniten.edu.my', 'password' => bcrypt('password123')],
            ['name' => 'user2', 'email' => 'user2@uniten.edu.my', 'password' => bcrypt('password123')],
            ['name' => 'user3', 'email' => 'user3@uniten.edu.my', 'password' => bcrypt('password123')],
        ];

        DB::table('users')->insert($users);
    }
}