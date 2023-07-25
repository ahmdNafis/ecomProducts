<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['percent', 'amount'];
        $discountType = $types[rand(0, count($types)-1)];
        $rate = $discountType == $types[0] ? rand(5, 30) : fake()->randomFloat(2, 10, 1000);
        $modelTypes = ['App\Models\ProductType', 'App\Models\Product'];
        $discType = $modelTypes[rand(0, count($modelTypes)-1)];
        $discID = $discType == $modelTypes[0] ? rand(1, ProductType::get()->last()->id) : rand(1, Product::get()->last()->id);
        return [
            'discount_type' => $discountType,
            'discount_rate' => $rate,
            'discountable_type' => $discType,
            'discountable_id' => $discID,
        ];
    }
}
