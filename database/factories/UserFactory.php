<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rng = rand(0, 1) == 1;
        $result_path;
        if ($rng) {
            $result_path = $this->faker->image('public/images/avatars', 500, 500, null, false);
        } else {
            $result_path = NULL;
        }

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'image_path' => $result_path,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
