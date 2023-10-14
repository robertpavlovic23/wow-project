@props(['player'])

<?php
use App\Enums\ClassColor;
?>


@if ($player->pivot->class === 'Warrior')
    {{ ClassColor::Warrior->value }}
@elseif($player->pivot->class === 'Hunter')
    {{ ClassColor::Hunter->value }}
@elseif($player->pivot->class === 'Mage')
    {{ ClassColor::Mage->value }}
@elseif($player->pivot->class === 'Rogue')
    {{ ClassColor::Rogue->value }}
@elseif($player->pivot->class === 'Priest')
    {{ ClassColor::Priest->value }}
@elseif($player->pivot->class === 'Warlock')
    {{ ClassColor::Warlock->value }}
@elseif($player->pivot->class === 'Paladin')
    {{ ClassColor::Paladin->value }}
@elseif($player->pivot->class === 'Druid')
    {{ ClassColor::Druid->value }}
@elseif($player->pivot->class === 'Shaman')
    {{ ClassColor::Shaman->value }}
@elseif($player->pivot->class === 'Monk')
    {{ ClassColor::Monk->value }}
@elseif($player->pivot->class === 'Demon Hunter')
    {{ ClassColor::DemonHunter->value }}
@elseif($player->pivot->class === 'Death Knight')
    {{ ClassColor::DeathKnight->value }}
@else
    {{ ClassColor::Evoker->value }}
@endif
