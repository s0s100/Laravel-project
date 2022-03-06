<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $maxUserId = User::all()->count();
        $maxPostId = Post::all()->count();

        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = $maxUserId),
            'post_id' => $this->faker->numberBetween($min = 1, $max = $maxPostId),
            'text' => $this->faker->text(),
        ];
    }
}
