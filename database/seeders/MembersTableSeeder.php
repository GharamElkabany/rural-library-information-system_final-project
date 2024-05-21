<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class MembersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('members')->insert([
            'name' => 'Alice Johnson',
            'ic_no' => 'S1234567D',
            'address' => '1234 Main St, Anytown',
            'contact_info' => 'alice@example.com',
        ]);

        Member::factory()->count(10)->create();
    }
}
