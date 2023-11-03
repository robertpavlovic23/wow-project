<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'name',
        'class',
        'spec',
        'icon',
    ];

    // // Relationship to User
    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // Relationship to Player
    public function player() {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
