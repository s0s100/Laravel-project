<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Friend;

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
        $count = User::all()->count();

        // Find random value which is not a part of the solution
        $rand1 = $this->faker->numberBetween($min = 1, $max = $count);
        $rand2 = $this->faker->numberBetween($min = 1, $max = $count);

        // Best complexity - 1, worst - infinity :o
        // Max random
        while ($rand1 == $rand2) {
            $rand2 = $this->faker->numberBetween($min = 1, $max = $count);
        }

        $found = Friend::all()->where('user_id', $rand1)->where('friend_id', $rand2)->first();
        if ($found != []) {
            return null;
        } 

        return [
            'user_id' => $rand1,
            'friend_id' => $rand2,
        ];
    }
}
