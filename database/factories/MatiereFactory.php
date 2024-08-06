<?php

namespace Database\Factories;

use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    protected $model = \App\Models\Matiere::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $matieres = [
            'Mathématiques', 'Physique', 'Chimie', 'Biologie', 'Histoire', 'Géographie', 'Français', 'Anglais', 'Philosophie', 'Informatique'
        ];

        return [
            'libelle' => $this->faker->randomElement($matieres),
            'date_debut' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'date_fin' => $this->faker->dateTimeBetween('now', '+1 years'),
            'ue_id' => Ue::factory(),
        ];
    }
}
