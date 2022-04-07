<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add some comments to 3 different posts
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->post_id = 1;
        $comment->text = "Totally not sure :(";
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 1;
        $comment->post_id = 2;
        $comment->text = "No...";
        $comment->save();

        $comment = new Comment();
        $comment->user_id = 1;
        $comment->post_id = 4;
        $comment->text = "SMORC";
        $comment->save();
        
        $comment = new Comment();
        $comment->user_id = 1;
        $comment->post_id = 4;
        $comment->text = "U got raided dude!";
        $comment->save();

        Comment::factory()->count(10)->create();
    }
}
