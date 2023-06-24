<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
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
        $product_name = $this->faker->unique()->words($nb=6, $asText = true);
        return [
            'name' => $product_name,
            'short_discription' => $this->faker->text(200),
            'discription' => $this->faker->text(500),
            'price' => $this->faker->numberBetween(10, 1000),
            'quantity' => $this->faker->numberBetween(10, 50),
            'photo' => 'product-'.$this->faker->numberBetween(1, 16),
            'user_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
