<?php

namespace Database\Factories;

use App\Models\Shipping;
use App\Models\ShippingRate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $methods = ['cash_on_delivery','card_transfer','mobile_transfer','online_payment'];
        return [
            'order_created' => fake()->date('Y-m-d', 'now'),
            'order_code' => fake()->lexify(),
            'grand_total' => fake()->randomFloat(2, 1, 100000),
            'total_quantity' => fake()->numberBetween(1, 100),
            'note' => fake()->sentence(10, true),
            'payment_method' => $methods[rand(0, count($methods)-1)],
            'shipping_rate_id' => rand(1, ShippingRate::get()->last()->id),
            'user_id' => rand(1, User::get()->last()->id),
            'paid' => fake()->boolean(70),
        ];
    }
}
