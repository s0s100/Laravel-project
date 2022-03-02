<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $a = new Animal();
        // $a->name = "Keith";
        // $a->weight = 17.2;
        // $a->save();

        Animal::factory()->count(50)->create();
    }
}
