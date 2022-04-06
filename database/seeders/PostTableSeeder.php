<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add a few posts
        $post = new Post();
        $post->user_id = 1;
        $post->name = "NOT SURE!";
        $post->text = "I am not sure what should I say...";
        $post->image_path = "abobus.jpg";
        $post->save();

        $post = new Post();
        $post->user_id = 1;
        $post->name = "No!";
        $post->text = "This is not what I want!";
        $post->image_path = "Shrek.jpg";
        $post->save();

        Post::factory()->count(10)->create();
    }
}
