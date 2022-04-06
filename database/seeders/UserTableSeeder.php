<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creates my user page
        $user = new User();
        $user->name = "Mikhail Okrugov";
        $user->description = "I like Minecraft, Chess and Piano :)";
        $user->email = "1916371@swansea.ac.uk";
        $user->image_path = "MyAvatar.jpg";
        $user->password = "qwerqwer";
        $user->save();

        User::factory()->count(10)->create();
    }
}
