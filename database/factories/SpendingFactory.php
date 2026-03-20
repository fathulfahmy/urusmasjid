<?php

namespace Database\Factories;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Spending>
 */
class SpendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min_amount = 20000;
        $max_amount = 500000;
        $purposes = [
            'Utility Bill (TNB/Air)',
            'Imam & Bilal Allowance',
            'Friday Prayers Catering',
            'Roof Leakage Repair',
            'Grass Cutting Service',
            'PA System Maintenance',
            'Cleaning Service Contract'
        ];

        return [
            'amount' => fake()->numberBetween($min_amount, $max_amount),
            'purpose' => fake()->randomElement($purposes),
            'spent_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
