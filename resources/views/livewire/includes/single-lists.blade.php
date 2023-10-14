@props(['boss', 'player'])

<td class="rounded-lg hover:bg-gray-700 text-xl px-5 py-2 border-b-[2px] border-base-200">
    <div class="dropdown dropdown-hover">
        <a class="w-full 
                @include('livewire.includes.player-class-colors', [
                    'player' => $player,
                ])"
            wire:click.prevent="insertPlayer({{ $boss->id }}, {{ $player->id }})">
            {{ $player->name }}
        </a>
        <div tabindex="0" class="card compact dropdown-content text-left w-64 bg-base-100 rounded-box z-50 border-2 border-base-300">
            <div class="card-body">

                {{-- Characters --}}
                @include('livewire.includes.dropdown-characters')

                {{-- Options --}}
                @include('livewire.includes.dropdown-options')
            </div>
        </div>
    </div>

</td>
