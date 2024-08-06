<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['admin', 'demba'];
        $emails = ['admin.polaris@example.com', 'demba.ndiakhate@example.com'];
        $passwords = ['123456789', '123456'];

        return [
            'name' => $this->faker->randomElement($names),
            'email' => $this->faker->unique()->randomElement($emails),
            'email_verified_at' => now(),
            'password' => bcrypt($this->faker->randomElement($passwords)),
            'remember_token' => Str::random(10),
        ];
    }
}
