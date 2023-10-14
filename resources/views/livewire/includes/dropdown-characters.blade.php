<a class="text-gray-500 text-xl -mt-2">Characters</a>
<ul class="flex flex-col border-l border-gray-700 pl-1">
    @foreach ($player->characters as $character)
        <li class="flex hover:bg-gray-800 hover:rounded-lg text-base cursor-pointer">
            <a class="w-full ml-2
                                @include('livewire.includes.character-class-colors', [
                                    'character' => $character,
                                ])"
                wire:click.prevent="updatePlayer({{ $boss->id }}, {{ $player->id }}, {{ $character }})">
                {{ $character->class }}
                ({{ $character->spec }})
            </a>
        </li>
    @endforeach
</ul>
