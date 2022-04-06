<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Friend;
use App\Models\User;

class FriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::all()->count();

        // Add my friends
        for ($i = 2; $i < $count; $i+=2) {
            $follower = new Friend();
            $follower->user_id = 1;
            $follower->friend_id = $i;
            $follower->save();
            
            $follower = new Friend();
            $follower->user_id = $i - 1;
            $follower->friend_id = 1;
            $follower->save();
        }

        // Friend::factory()->count(10)->create();
        for ($i = 2; $i < $count; $i++) {         
            $rand = rand($min = 1, $max = $count);

            $newFollow = new Friend();
            $newFollow->user_id = $i;

            // Best complexity - 1, worst - infinity :o
            // Max random
            while ($i == $rand) {
                $rand = rand($min = 1, $max = $count);
            }

            $newFollow->friend_id = $rand;
            $newFollow->save();
        }
    }
}
