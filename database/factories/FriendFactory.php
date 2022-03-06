<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friend>
 */
class FriendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Repeated data (1 is a friend of 1)
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'friend_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
