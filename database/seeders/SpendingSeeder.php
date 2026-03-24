<?php

namespace Database\Seeders;

use App\Models\Spending;
use Illuminate\Database\Seeder;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spending::factory()->count(50)->create();
    }
}
