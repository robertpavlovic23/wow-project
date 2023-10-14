@props(['player'])

<?php
use App\Enums\ClassColor;
?>


@if ($player->character_class === 'Warrior')
    {{ ClassColor::Warrior->value }}
@elseif($player->character_class === 'Hunter')
    {{ ClassColor::Hunter->value }}
@elseif($player->character_class === 'Mage')
    {{ ClassColor::Mage->value }}
@elseif($player->character_class === 'Rogue')
    {{ ClassColor::Rogue->value }}
@elseif($player->character_class === 'Priest')
    {{ ClassColor::Priest->value }}
@elseif($player->character_class === 'Warlock')
    {{ ClassColor::Warlock->value }}
@elseif($player->character_class === 'Paladin')
    {{ ClassColor::Paladin->value }}
@elseif($player->character_class === 'Druid')
    {{ ClassColor::Druid->value }}
@elseif($player->character_class === 'Shaman')
    {{ ClassColor::Shaman->value }}
@elseif($player->character_class === 'Monk')
    {{ ClassColor::Monk->value }}
@elseif($player->character_class === 'Demon Hunter')
    {{ ClassColor::DemonHunter->value }}
@elseif($player->character_class === 'Death Knight')
    {{ ClassColor::DeathKnight->value }}
@else
    {{ ClassColor::Evoker->value }}
@endif
