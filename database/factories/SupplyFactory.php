<?php

namespace Database\Factories;

use App\Models\Supply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Supply>
 */
class SupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $supplies = [
            'Hand Soap' => 'Bottle',
            'Floor Cleaner' => 'Bottle',
            'Toilet Paper' => 'Roll',
            'Mineral Water' => 'Bottle',
            'Coffee' => 'Packet',
            'Tea' => 'Packet',
            'Sugar' => 'Packet',
            'A4 Paper' => 'Ream',
            'Ink Toner' => 'Catridge',
            'Air Freshener' => 'Catridge',
            'Prayer Mats' => 'Pieces',
            'Telekung' => 'Pieces',
        ];
        $name = fake()->randomElement(array_keys($supplies));
        $min_quantity = 5;
        $max_quantity = 100;

        return [
            'name' => $name,
            'quantity' => fake()->numberBetween($min_quantity, $max_quantity),
            'unit' => $supplies[$name],
        ];
    }
}
