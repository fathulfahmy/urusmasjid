<?php

namespace Database\Factories;

use App\Models\Appliance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appliance>
 */
class ApplianceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $appliances = [
            'Air Conditioner' => ['Panasonic', 'Daikin', 'York'],
            'Audio' => ['Yamaha', 'Bose', 'TOA'],
            'Camera' => ['Hikvision', 'Dahua'],
            'Water Cooler' => ['Coway', 'Cuckoo'],
            'Projector' => ['Epson', 'Sony']
        ];
        $category = fake()->randomElement(array_keys($appliances));
        $brand = fake()->randomElement($appliances[$category]);

        return [
            'category' => $category,
            'brand' => $brand,
            'model' => strtoupper(fake()->bothify('??###')),
            'serial_number' => strtoupper(fake()->bothify('SN####????##')),
            'serviced_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
