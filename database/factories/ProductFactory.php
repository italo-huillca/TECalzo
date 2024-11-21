<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'size' => $this->faker->numberBetween(35, 46), // Tallas numéricas entre 35 y 46
            'category_id' => Category::inRandomOrder()->first()->id,
            'stock' => $this->faker->numberBetween(1, 50),
        ];
    }
}
