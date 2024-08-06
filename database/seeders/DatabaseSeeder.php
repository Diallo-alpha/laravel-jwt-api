<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            userSeeder::class,
            UeSeeder::class,
            MatiereSeeder::class,
            EtudiantSeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}
