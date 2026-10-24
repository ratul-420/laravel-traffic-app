<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User1', 'email' => 'aaa@aaa.hu',
            'password' => bcrypt('aaaaaaaa'), 'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin', 'email' => 'bbb@bbb.hu',
            'password' => bcrypt('bbbbbbbb'), 'role' => 1, 'email_verified_at' => now(),
        ]);
    }
}
