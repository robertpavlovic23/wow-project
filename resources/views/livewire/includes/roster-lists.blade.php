@props(['boss', 'player'])

<li class="text-xl rounded-lg hover:bg-gray-700 p-2 pl-4 cursor-pointer">
    <div class="dropdown dropdown-hover">

        {{-- Player Name --}}
        <a class="w-full
                    @include('livewire.includes.roster-class-colors', [
                        'player' => $player,
                    ])"
            wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>

        {{-- Dropdown --}}
        <div tabindex="0"
            class="card compact dropdown-content w-64 bg-base-100 rounded-box z-50 border-2 border-base-300">
            <div class="card-body">

                {{-- Characters --}}
                @include('livewire.includes.dropdown-characters')

                {{-- Options --}}
                @include('livewire.includes.dropdown-options')
            </div>
        </div>
    </div>
</li>
