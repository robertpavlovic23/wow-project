@props(['boss', 'player'])

<li class="text-xl rounded-lg hover:bg-gray-700 p-2 pl-4 cursor-pointer">
    <div class="dropdown dropdown-hover">

        {{-- Player Name --}}
        <a class="w-full"
            wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>

        {{-- Dropdown --}}
        <div tabindex="0" class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
            <div class="card-body">

                {{-- Characters --}}
                <a class="text-gray-500 text-xl -mt-2">Characters</a>
                <ul class="flex flex-col border-l border-gray-700 pl-1">
                    @foreach ($player->characters as $character)
                        <li class="flex hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                            <a class="w-full ml-2
                                @include('livewire.includes.character-class-colors', [
                                    'character' => $character,
                                ])"
                                wire:click.prevent="updatePlayer({{ $boss->id }}, {{ $player->id }}, '{{ $character->role }}')">
                                {{ $character->class }}
                                ({{ $character->role }})
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- Options --}}
                <div class="divider divider-vertical">Options</div>
                <ul class="flex flex-col border-l border-gray-700 pl-1">
                    <li class="flex hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                        <a class="w-full ml-2">Edit</a>
                    </li>
                    <li class="flex text-red-400 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                        <a class="w-full ml-2" wire:click.prevent="deletePlayer({{ $player->id }})">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>
