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

        $rng = rand(0, 1) == 1;
        $result_path;
        if ($rng) {
            $result_path = $this->faker->image('public/images/posts', 500, 500, null, false);
        } else {
            $result_path = NULL;
        }

        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = $maxUserId),
            'name' => $this->faker->word($nb = 5, $asText = false),
            'text' => $this->faker->text(),
            'image_path' => $result_path,
        ];
    }
}
