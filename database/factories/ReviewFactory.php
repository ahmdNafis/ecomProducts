<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review_title' => fake()->words(6, true),
            'review_body' => fake()->sentences(3, true),
            'review_star' => fake()->randomBetween(1, 5),
            'product_id' => rand(1, Product::get()->last()->id),
            'user_id' => rand(1, User::get()->last()->id),
        ];
    }
}
