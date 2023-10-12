<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'rank',  
        'character_role'  
    ];

    // Relationship to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to Character
    public function characters() {
        return $this->hasMany(Character::class, 'player_id');
    }

    // Relationship to Boss
    public function bosses() {
        return $this->belongsToMany(Boss::class, 'boss_player', 'player_id', 'boss_id');
    }
}
