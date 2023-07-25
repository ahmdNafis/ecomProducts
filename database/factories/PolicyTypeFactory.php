<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PolicyType>
 */
class PolicyTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_type_title' => fake()->words(2, true),
            'policy_type_description' => fake()->sentence(5, true),
            'policy_type_active' => fake()->boolean(75),
        ];
    }
}
