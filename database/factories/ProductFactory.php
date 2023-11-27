<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'name' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement(['Necklace', 'Bracelet', 'Earring', 'Ring']),
            'stock' => $this->faker->randomNumber(3, false),
            'price' => $this->faker->randomFloat(2, 0, 500),
            'description' => $this->faker->sentence(10),
        ];
    }
}
