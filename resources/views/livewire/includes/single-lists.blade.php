@props(['boss', 'player'])

<td class="rounded-lg hover:bg-gray-700 text-xl px-5 py-2 border-b-[2px] border-base-200">
    <div class="dropdown dropdown-hover">
        <a class="w-full" wire:click.prevent="insertPlayer({{ $boss->id }}, {{ $player->id }})">
            {{ $player->name }}
        </a>
        <div tabindex="0" class="card compact dropdown-content text-left w-64 shadow bg-base-200 rounded-box z-50">
            <div class="card-body">

                {{-- Characters --}}
                <a class="text-gray-500 text-xl -mt-2">Characters</a>
                <ul class="flex flex-col border-l border-gray-700 pl-1">
                    @foreach ($player->characters as $character)
                        <li class="flex hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                            <a class="w-full ml-2 text-
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

</td>
