<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etudiant::factory()->count(50)->create();
    }
}
