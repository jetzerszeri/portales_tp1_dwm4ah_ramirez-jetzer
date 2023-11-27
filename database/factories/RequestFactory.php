<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::limit($this->faker->name, 50),
            'lastname' => Str::limit($this->faker->lastname, 50),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state_id' => fake()->numberBetween(1, 2),
            'zip_code' => $this->faker->numerify('#####'),
            'service_id' => Service::inRandomOrder()->first()->id,
            'service_date' => fake()->date(),
            'notes' => fake()->sentence(),
        ];
    }
}
