<?php

namespace Database\Factories;

use App\Models\Mosque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<Mosque>
 */
class MosqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'Masjid Zahir',
            'Masjid Abu Bakar',
            'Masjid Abidin',
            'Masjid Kampung Laut',
        ];

        $methods = [
            0 => '0 - Jafari / Shia Ithna-Ashari',
            1 => '1 - University of Islamic Sciences, Karachi',
            2 => '2 - Islamic Society of North America',
            3 => '3 - Muslim World League',
            4 => '4 - Umm Al-Qura University, Makkah',
            5 => '5 - Egyptian General Authority of Survey',
            7 => '7 - Institute of Geophysics, University of Tehran',
            8 => '8 - Gulf Region',
            9 => '9 - Kuwait',
            10 => '10 - Qatar',
            11 => '11 - Majlis Ugama Islam Singapura, Singapore',
            12 => '12 - Union Organization islamic de France',
            13 => '13 - Diyanet İşleri Başkanlığı, Turkey',
            14 => '14 - Spiritual Administration of Muslims of Russia',
            15 => '15 - Moonsighting Committee Worldwide',
            16 => '16 - Dubai (experimental)',
            17 => '17 - Jabatan Kemajuan Islam Malaysia (JAKIM)',
            18 => '18 - Tunisia',
            19 => '19 - Algeria',
            20 => '20 - KEMENAG - Indonesia',
            21 => '21 - Morocco',
            22 => '22 - Comunidade Islamica de Lisboa',
            23 => '23 - Ministry of Awqaf, Jordan',
        ];

        $schools = [
            0 => '0 - Shafi',
            1 => '1 - Hanafi',
        ];

        return [
            'name' => fake()->randomElement($names),
            'address' => fake()->address(),
            'timezone' => fake()->randomElement(array_combine(timezone_identifiers_list(), timezone_identifiers_list())),
            'method' => fake()->randomElement($methods),
            'school' => fake()->randomElement($schools),
            'tune' => '0,9,0,3,4,2,2,2,0',
            'iqamat' => 15,
            'pray' => 10,
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Model $model) {
            $directory = database_path('seeders/media/mosque');
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
