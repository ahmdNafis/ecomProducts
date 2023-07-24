<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductType>
 */
class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_name' => fake()->words(2, true),
            'type_description' => fake()->sentences(3, true),
            'type_weight' => fake()->numberBetween(1, 10),
            'type_active' => fake()->boolean(80),
        ];
    }
}
