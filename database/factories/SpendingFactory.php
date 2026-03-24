<?php

namespace Database\Factories;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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
            'Utility Bill',
            'Imam Allowance',
            'Bilal Allowance',
            'Friday Prayers Catering',
            'Roof Repair',
            'Toilet Repair',
            'Grass Cutting Service',
            'Deep Cleaning Service',
        ];

        return [
            'amount' => fake()->numberBetween($min_amount, $max_amount),
            'purpose' => fake()->randomElement($purposes),
            'spent_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Model $model) {
            $directory = database_path('seeders/media/receipts');
            $files = File::files($directory);
            if (count($files) > 0) {
                $randomFile = fake()->randomElement($files);
                $model->addMedia($randomFile->getPathname())
                    ->preservingOriginal()
                    ->toMediaCollection('default', 'media');
            }
        });
    }
}
