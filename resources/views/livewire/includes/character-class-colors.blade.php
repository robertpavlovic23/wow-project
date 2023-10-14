@props(['character'])

@if ($character->class === 'Warrior')
    text-yellow-800
@elseif($character->class === 'Hunter')
    text-green-500
@elseif($character->class === 'Mage')
    text-cyan-400
@elseif($character->class === 'Rogue')
    text-yellow-300
@elseif($character->class === 'Priest')
    text-white
@elseif($character->class === 'Warlock')
    text-purple-400
@elseif($character->class === 'Paladin')
    text-pink-300
@elseif($character->class === 'Druid')
    text-orange-500
@elseif($character->class === 'Shaman')
    text-blue-600
@elseif($character->class === 'Monk')
    text-green-300
@elseif($character->class === 'Demon Hunter')
    text-purple-700
@elseif($character->class === 'Death Knight')
    text-red-700
@else
    text-green-700
@endif
