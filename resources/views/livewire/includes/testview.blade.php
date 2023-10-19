<a class="w-full
                    @include('livewire.includes.roster-class-colors', [
                        'player' => $player,
                    ])"
            wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>