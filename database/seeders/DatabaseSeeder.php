<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\Role;
use App\Models\User;
use App\Models\Request;
use App\Models\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();

        $this->call([
            CategoriesSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            StatesSeeder::class,
            ServicesSeeder::class,
            RequestsSeeder::class,
        ]);
        
        Service::factory(10)->create();
        User::factory(10)->create();
        Request::factory(10)->create();

    }
}
