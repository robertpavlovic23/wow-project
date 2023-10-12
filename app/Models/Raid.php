<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raid extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Relationship With Boss
    public function bosses() {
        return $this->hasMany(Boss::class, 'raid_id');
    }
}
