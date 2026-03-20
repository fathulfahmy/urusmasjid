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
        Mosque::create([
            'name' => 'Sultan Abdullah',
            'location' => 'WLY01',
        ]);
    }
}
