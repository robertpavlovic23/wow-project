@props(['player'])

<?php
use App\Enums\ClassColor;
?>


@if ($player->character_class == 'Warrior')
    text-yellow-800
@elseif($player->character_class === 'Hunter')
    text-green-500
@elseif($player->character_class === 'Mage')
    text-cyan-400
@elseif($player->character_class === 'Rogue')
    text-yellow-400
@elseif($player->character_class === 'Priest')
    text-white
@elseif($player->character_class === 'Warlock')
    text-purple-400
@elseif($player->character_class === 'Paladin')
    text-pink-300
@elseif($player->character_class === 'Druid')
    text-orange-500
@elseif($player->character_class === 'Shaman')
    text-blue-600
@elseif($player->character_class === 'Monk')
    text-green-300
@elseif($player->character_class === 'Demon Hunter')
    text-purple-700
@elseif($player->character_class === 'Death Knight')
    text-red-700
@else
    text-green-700
@endif
