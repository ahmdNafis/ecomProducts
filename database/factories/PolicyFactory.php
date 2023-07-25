<?php

namespace Database\Factories;

use App\Models\PolicyType;
use Database\Seeders\PolicySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_title' => fake()->words(4, true),
            'policy_body' => fake()->sentences(3, true),
            'policy_enabled' => fake()->boolean(80),
            'policy_type_id' => rand(1, PolicyType::get()->last()->id),
        ];
    }
}
