<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $durations = [5, 10, 15];

        return [
            'duration' => fake()->randomElement($durations),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Gallery $gallery) {
            $directory = database_path('seeders/gallery');
            $files = File::files($directory);
            if (count($files) > 0) {
                $randomFile = fake()->randomElement($files);
                $gallery->addMedia($randomFile->getPathname())
                    ->preservingOriginal()
                    ->toMediaCollection('default', 'media');
            }
        });
    }
}
