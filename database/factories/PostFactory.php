<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $maxUserId = User::all()->count();

        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = $maxUserId),
            'text' => $this->faker->text(),
        ];
    }
}
