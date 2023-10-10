<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('requests')->insert([
            'name' => 'Christian',
            'lastname' => 'García',
            'email' => 'ejemplo@gmail.com',
            'address' => '2584 West Mecklenburg Avenue',
            'city' => 'Charlotte',
            'state_id' => '1',
            'zip_code' => '28202',
            'service_id' => '1',
            'service_date' => '2023-10-10',
            'notes' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
        ]);
    }
}
