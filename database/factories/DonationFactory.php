<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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
            'Haji Mubarak',
            'Hajah Jamilah',
            'Tengku Iskandar',
            'Keluarga Almarhum Haji Khalid',
            'Waris Almarhumah Hajah Alias',
            'Restoran Salam Sentosa',
            'Weekly Collection',
            'Empu Sdn Bhd',
        ];

        return [
            'amount' => fake()->randomElement($amount),
            'donator' => fake()->randomElement($donators),
            'donated_at' => fake()->dateTimeBetween('-1 year', 'now'),
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
                    ->toMediaCollection();
            }
        });
    }
}
