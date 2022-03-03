<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = "animals";
    protected $primaryKey = 'id';

    // To link models
    // One to one
    public function emergencyContact(){
        return $this->hasOne(EmergencyContact::class);
    }

    // One to many
    public function enclosure(){
        return $this->belongsTo(Enclosure::class);
    }

    // Many to many
    public function keepers(){
        return $this->belongsToMany(Keeper::class);
    }
}