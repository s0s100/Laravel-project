<?php

namespace Database\Seeders;

use App\Models\Keeper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeepersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Keeper();
        $k->name = "Lisa";
        $k->save();
        $k->animals()->attach(1);
        $k->animals()->attach(23);
    }
}
