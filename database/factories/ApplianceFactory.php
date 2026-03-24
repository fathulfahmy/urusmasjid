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
            'Air Conditioner' => ['York', 'Daikin'],
            'Fan' => ['Elba', 'Panasonic', 'Khind'],
            'Audio' => ['Bose', 'JBL', 'Yamaha'],
            'CCTV' => ['TP-Link', 'Dahua', 'Reolink'],
            'Water Purifier' => ['Coway', 'Cuckoo'],
            'Projector' => ['Epson', 'BenQ', 'ViewSonic'],
            'Refrigerator' => ['Samsung', 'LG'],
            'Printer' => ['Canon', 'Brother', 'HP'],
        ];
        $category = fake()->randomElement(array_keys($appliances));
        $brand = fake()->randomElement($appliances[$category]);

        return [
            'category' => $category,
            'brand' => $brand,
            'model' => strtoupper(fake()->bothify('??###')),
            'label' => strtoupper(fake()->bothify('SN####????##')),
            'serviced_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
