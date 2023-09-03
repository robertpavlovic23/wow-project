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
        'role',
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
}
