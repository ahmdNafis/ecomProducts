<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ProductTypeSeeder::class,
        ProductSeeder::class,
        SizeSeeder::class,
        ReviewSeeder::class,
        UserSeeder::class,
        ShippingRateSeeder::class,
        PolicyTypeSeeder::class,
        PolicySeeder::class,
        MessageTypeSeeder::class,
        MessageSeeder::class,
        Shipping::class,
        CompanyProfileSeeder::class,
        DiscountSeeder::class,
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
