<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();

        \App\Models\Category::factory(5)->create();

        $this->call([
            // CategoriesSeeder::class,
            // ServicesSeeder::class,
            // UsersSeeder::class,
            // RequestsSeeder::class,
            // StatesSeeder::class,
            // RolesSeeder::class,
        ]);
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
