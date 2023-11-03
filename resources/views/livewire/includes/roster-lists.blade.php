@props(['boss', 'player'])

<div class="text-xl rounded-lg hover:bg-gray-700 py-3 cursor-pointer text-center">
    <div class="dropdown dropdown-hover text-left">

        {{-- Player Name --}}
        <button type="button"
            class="w-full 
        {{ view('livewire.includes.player-class-colors', [
            'player' => $player,
        ]) }}"
            wire:click="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</button>

        {{-- @include('livewire.includes.testview') --}}

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
</div>
