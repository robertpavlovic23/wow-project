<?php

namespace App\Enums;

enum ClassColor:string
{
    case Warrior = 'text-yellow-800';
    case Hunter = 'text-green-500';
    case Mage = 'text-cyan-400';
    case Rogue = 'text-yellow-400';
    case Priest = 'text-white';
    case Warlock = 'text-purple-400';
    case Paladin = 'text-pink-300';
    case Druid = 'text-orange-500';
    case Shaman = 'text-blue-600';
    case Monk = 'text-green-300';
    case DemonHunter = 'text-purple-700';
    case DeathKnight = 'text-red-700';
    case Evoker = 'text-green-700';
}
