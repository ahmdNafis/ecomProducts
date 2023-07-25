<?php

namespace Database\Factories;

use App\Models\MessageType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message_title' => fake()->sentence(5, true),
            'message_body' => fake()->sentences(4, true),
            'message_type_id' => rand(1, MessageType::get()->last()->id),
        ];
    }
}
