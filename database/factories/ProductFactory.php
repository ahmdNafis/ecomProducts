<?php

namespace Database\Factories;

use App\Models\ProductType;
use App\Models\ProductType as ModelsProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'product_title' => fake()->words('3', true),
            'product_code' => fake()->lexify(),
            'product_slug' => fake()->slug(3),
            'product_price' => fake()->randomFloat(2, 1, 100000),
            'product_available' => fake()->boolean(80),
            'product_featured' => fake()->numberBetween(0, 10),
            'has_sizes' => fake()->boolean(75),
            'product_images' => fake()->url(),
            'product_type_id' => rand(1, ProductType::get()->last()->id),
        ];
    }
}
