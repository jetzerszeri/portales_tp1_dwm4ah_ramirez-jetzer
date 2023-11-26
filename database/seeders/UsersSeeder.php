<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('password'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Roberto',
            'lastname' => 'Alvarenga',
            'email' => 'editor1@gbygpcs.com',
            'password' => Hash::make('password'),
            'role_id' => '2',
        ]);
    }
}
