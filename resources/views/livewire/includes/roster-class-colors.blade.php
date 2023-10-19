@props(['player'])

<?php
use App\Enums\ClassColor;
?>


@if ($player->pivot->class === 'Warrior')
    text-yellow-800
@elseif($player->pivot->class === 'Hunter')
    text-green-500
@elseif($player->pivot->class === 'Mage')
    text-cyan-400
@elseif($player->pivot->class === 'Rogue')
    text-yellow-400
@elseif($player->pivot->class === 'Priest')
    text-white
@elseif($player->pivot->class === 'Warlock')
    text-purple-400
@elseif($player->pivot->class === 'Paladin')
    text-pink-300
@elseif($player->pivot->class === 'Druid')
    text-orange-500
@elseif($player->pivot->class === 'Shaman')
    text-blue-600
@elseif($player->pivot->class === 'Monk')
    text-green-300
@elseif($player->pivot->class === 'Demon Hunter')
    text-purple-700
@elseif($player->pivot->class === 'Death Knight')
    text-red-700
@else
    text-green-700
@endif
