<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keeper extends Model
{
    use HasFactory;

    // Many to many
    public function animals(){
        return $this->belongsToMany(Animal::class);
    }
}
