<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::factory()->count(10)->create();

        $ids = Gallery::pluck('id')->toArray();
        Gallery::setNewOrder($ids);
    }
}
