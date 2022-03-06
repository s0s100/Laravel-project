<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    // Post belongs to a user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Comments under the post
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
