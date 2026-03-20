<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = [1000, 5000, 10000, 50000, 100000];
        $donators = [
            'Hamba Allah',
            'Tan Sri Dr. Zul',
            'Dato Seri Ahmad',
            'Puan Sri Salmah',
            'Keluarga Arwah Haji Bakri',
            'Syarikat Teguh Sdn Bhd'
        ];

        return [
            'amount' => fake()->randomElement($amount),
            'donator' => fake()->randomElement($donators),
            'donated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
