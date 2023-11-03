@props(['boss', 'player'])

<div class="cursor-pointer rounded-lg hover:bg-gray-700 text-xl px-3 py-3 border-base-200 text-center">
    <div class="dropdown dropdown-hover text-left">
        @if ($player->rank !== 'Away')
            <button type="button"
                class="w-full 
                    {{ view('livewire.includes.player-class-colors', [
                        'player' => $player,
                    ]) }}"
                wire:click="insertPlayer({{ $boss->id }}, {{ $player->id }})">
                {{ $player->name }}
            </button>
        @else
            <button type="button"
                class="w-full 
                    {{ view('livewire.includes.player-class-colors', [
                        'player' => $player,
                    ]) }}">
                {{ $player->name }}
            </button>
        @endif

        <div tabindex="0"
            class="card compact dropdown-content text-left w-64 bg-base-100 rounded-box z-50 border-2 border-base-300">
            <div class="card-body">

                {{-- Characters --}}
                @include('livewire.includes.dropdown-characters')

                {{-- Options --}}
                @include('livewire.includes.dropdown-options')
            </div>
        </div>
    </div>
</div>
