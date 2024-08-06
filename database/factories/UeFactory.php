<?php

namespace Database\Factories;

use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UE>
 */
class UeFactory extends Factory
{
    protected $model = UE::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ues = [
            'Sciences de la vie et de la terre', 'Sciences physiques et chimiques', 'Sciences humaines et sociales', 'Lettres et langues', 'Sciences informatiques'
        ];

        return [
            'libelle' => $this->faker->randomElement($ues),
            'date_debut' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'date_fin' => $this->faker->dateTimeBetween('now', '+1 years'),
            'coef' => $this->faker->numberBetween(1, 5),
        ];
    }
}
