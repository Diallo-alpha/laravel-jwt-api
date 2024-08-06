<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    protected $model = \App\Models\Evaluation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'valeur' => $this->faker->numberBetween(0, 20),
            'etudiant_id' => \App\Models\Etudiant::factory(),
            'matiere_id' => \App\Models\Matiere::factory(),
        ];
    }
}
