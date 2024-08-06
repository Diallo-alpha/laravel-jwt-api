<?php

namespace Database\Seeders;

use App\Models\Ue;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ue::factory()->count(10)->create();
    }
}
