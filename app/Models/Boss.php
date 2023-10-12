<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    use HasFactory;

    protected $fillable = [
        'raid_id',
        'name',
        'positionInRaid',
    ];

    // Relationship to Raid
    public function raid() {
        return $this->belongsTo(Raid::class, 'raid_id');
    }

    // Relationship to Player
    public function players() {
        return $this->belongsToMany(Player::class, 'boss_player', 'boss_id', 'player_id');
    }

    // Relationship to Character
    public function characters() {
        return $this->hasManyThrough(Character::class, Player::class);
    }
}
