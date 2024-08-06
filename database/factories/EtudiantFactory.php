<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    protected $model = \App\Models\Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prenoms = ['Awa', 'Moussa', 'Fatou', 'Alioune', 'Aminata', 'Ibrahima', 'Mariama', 'Ousmane', 'Seynabou', 'Cheikh'];
        $noms = ['Diop', 'Ndiaye', 'Ba', 'Fall', 'Faye', 'Gueye', 'Kane', 'Sow', 'Cisse', 'Sy'];
        $adresses = [
            'Rue de Thiaroye, Dakar',
            'Avenue Cheikh Anta Diop, Dakar',
            'Boulevard du Centenaire, Dakar',
            'Rue Faidherbe, Dakar',
            'Avenue Malick Sy, Dakar'
        ];
        $telephones = [
            '778123456',
            '708765432',
            '778901234',
            '708654321',
            '776543210'
        ];

        return [
            'prenom' => $this->faker->randomElement($prenoms),
            'nom' => $this->faker->randomElement($noms),
            'adresse' => $this->faker->randomElement($adresses),
            'telephone' => $this->faker->randomElement($telephones),
            'date_de_naissance' => $this->faker->date('Y-m-d', '2005-01-01'),
            'matricule' => Str::random(10),
            'email' => $this->faker->unique()->safeEmail,
            'mot_de_passe' => bcrypt('password'),
            'photo' => $this->faker->imageUrl(640, 480, 'people'),
        ];
    }
}
