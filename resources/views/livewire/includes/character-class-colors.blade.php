@props(['character'])

<?php
use App\Enums\ClassColor;
?>


@if ($character->class === 'Warrior')
    {{ ClassColor::Warrior->value }}
@elseif($character->class === 'Hunter')
    {{ ClassColor::Hunter->value }}
@elseif($character->class === 'Mage')
    {{ ClassColor::Mage->value }}
@elseif($character->class === 'Rogue')
    {{ ClassColor::Rogue->value }}
@elseif($character->class === 'Priest')
    {{ ClassColor::Priest->value }}
@elseif($character->class === 'Warlock')
    {{ ClassColor::Warlock->value }}
@elseif($character->class === 'Paladin')
    {{ ClassColor::Paladin->value }}
@elseif($character->class === 'Druid')
    {{ ClassColor::Druid->value }}
@elseif($character->class === 'Shaman')
    {{ ClassColor::Shaman->value }}
@elseif($character->class === 'Monk')
    {{ ClassColor::Monk->value }}
@elseif($character->class === 'Demon Hunter')
    {{ ClassColor::DemonHunter->value }}
@elseif($character->class === 'Death Knight')
    {{ ClassColor::DeathKnight->value }}
@else
    {{ ClassColor::Evoker->value }}
@endif
