<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        return [
            'code'=>str::upper(fake()->unique()->lexify('Discount????')),
            'quantity'=>fake()->numberBetween(1,100),
            'percentage'=>fake()->numberBetween(10,90),
            'expiry_date'=>fake()->dateTimeBetween('now','+1 year'),
        ];
    }
}
