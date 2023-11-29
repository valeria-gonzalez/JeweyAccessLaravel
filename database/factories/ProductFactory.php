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
            'image'=> function () {
                $image = $this->faker->image(
                    storage_path('app/public/product_images'), // Save to storage/app/public/product_images
                    360,
                    360,
                    'jewelry',
                    false, // Set to false to get the relative path
                    true,
                    'jpg'
                );
        
                // Get the relative path to the saved image
                $relativePath = 'product_images/' . basename($image);
        
                // Return the relative path to be stored in the 'image' field
                return $relativePath;
            },
        ];
    }
}
