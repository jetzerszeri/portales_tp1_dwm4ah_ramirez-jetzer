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
        // Category::truncate();
        // Service::truncate();
        // Role::truncate();
        // Request::truncate();
        // State::truncate();

        // \App\Models\Category::factory(2)->create();
        
        $this->call([
            CategoriesSeeder::class,
            // ServicesSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            // RequestsSeeder::class,
            // StatesSeeder::class,
        ]);
        
        \App\Models\Service::factory(5)->create();
        \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
