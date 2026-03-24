<?php

namespace Database\Seeders;

use App\Models\Mosque;
use Illuminate\Database\Seeder;

class MosqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mosque::factory()->create([
            'name' => 'Masjid Al-Sultan Abdullah',
            'address' => 'Kuala Lumpur, Malaysia',
            'timezone' => 'Asia/Kuala_Lumpur',
            'method' => 17,
            'school' => 0,
            'tune' => '0,9,0,3,4,2,2,2,0',
        ]);
    }
}
