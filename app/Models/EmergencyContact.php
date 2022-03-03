<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;
    protected $table = "emergency_contacts";
    protected $primaryKey = 'animal_id';

    // To link models
    // One to one
    public function emergencyContact(){
       return $this->belongsTo(Animal::class);
    }
}