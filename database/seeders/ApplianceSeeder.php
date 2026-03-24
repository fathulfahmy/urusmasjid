<?php

namespace Database\Seeders;

use App\Models\Appliance;
use Illuminate\Database\Seeder;

class ApplianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appliance::factory()->count(50)->create();
    }
}
