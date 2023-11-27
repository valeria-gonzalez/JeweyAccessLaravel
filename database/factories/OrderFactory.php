<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientIds = Client::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        return [
            'client_id' => $this->faker->randomElement($clientIds),
            'total' => $this->faker->randomFloat(2, 0, 500),
            'delivery_date' => $this->faker->date(),
            'delivery_time' => $this->faker->time(),
            'street' => $this->faker->streetName(),
            'apt_number' => $this->faker->randomNumber(3, false),
            'neighborhood' => $this->faker->word(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'zipcode' => $this->faker->postcode(),
            'references' => $this->faker->sentence(10),

            
        ];
    }
}
