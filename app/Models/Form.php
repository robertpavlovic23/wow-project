<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'age',
        'character_name',
        'character_realm',
        'class',
        'spec',
        'battle_net_tag',
        'discord_tag',
        'ui_vod',
        'plans',
        'history',
        'pick',
        'additional',
        'warcraftlogs',
        'warcraftlogs_alt',
        'raiderio',
        'raiderio_alt',
        'wow_armory',
        'wow_armory_alt'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('class', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('class', 'like', '%' . request('search') . '%')
                ->orWhere('spec', 'like', '%' . request('search') . '%')
                ->orWhere('character_name', 'like', '%' . request('search') . '%');
        }
    }
}