<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Client::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'name' => fake()->name(),
            'firstname' => fake()->firstName(),
            'phone' => fake()->numberBetween(100,180),
            'adress' => fake()->city(),
            'town' => fake()->address(),
            'client_number' => fake()->numberBetween(2,100)
        ];
    }
}
