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
        'name' => 'Gharam', 
        'email' => 'SW01081990@student.uniten.edu.my', 
        'password' => bcrypt('password123'),
        'userLevel' => '0',
        'userType' => 'Supervisor',
        ]);
       
        //insert DB
        DB::table('users')->insert(['name' => 'Admin','email' => 'admin@uniten.edu.my','password' => bcrypt('password123'), 'userLevel'=>'0', 'userType'=>'Supervisor']);

        //insert multiple
        $users =[
            ['name' => 'user1', 'email' => 'user1@uniten.edu.my', 'password' => bcrypt('password123'), 'userLevel'=>'1', 'userType'=>'Volunteer'],
            ['name' => 'user2', 'email' => 'user2@uniten.edu.my', 'password' => bcrypt('password123'), 'userLevel'=>'1', 'userType'=>'Volunteer'],
            ['name' => 'user3', 'email' => 'user3@uniten.edu.my', 'password' => bcrypt('password123'), 'userLevel'=>'1', 'userType'=>'Volunteer'],
        ];

        DB::table('users')->insert($users);
    }
}