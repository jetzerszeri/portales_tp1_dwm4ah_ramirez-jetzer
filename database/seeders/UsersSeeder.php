<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Jake',
            'lastname' => 'Ze',
            'email' => 'admin@gbygpcs.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Rose',
            'lastname' => 'Alvarenga',
            'email' => 'editor1@gbygpcs.com',
            'password' => bcrypt('password'),
            'role' => 'editor',
        ]);
    }
}
