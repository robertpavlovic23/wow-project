<div class="w-full bg-base-200">
    <div class="grid grid-cols-1 2xl:grid-cols-12 gap-4 space-y-4 lg:space-y-0 lg:p-36">
        {{-- Left Side of the Page --}}
        <div class="2xl:col-span-9">
            {{-- @include('livewire.includes.flash-message') --}}
            @unless (count($bossesQuery) == 0)
                @foreach ($bossesQuery as $boss)
                    <div class="collapse overflow-visible collapse-plus bg-base-100 shadow-xl">
                        <input type="checkbox" checked />
                        <div class="collapse-title text-xl font-medium">{{ $boss->name }}</div>
                        <div class="collapse-content">
                            <div class="grid grid-cols-1 2xl:grid-cols-4 gap-16">
                                {{-- First Row 4 Lists --}}
                                <div class="2xl:col-span-4 grid grid-cols-1 2xl:grid-cols-4 rounded gap-4">
                                    {{-- Tank List --}}
                                    <div class="shadow-xl rounded-box bg-base-200">
                                        <p class="menu-title text-2xl mt-1 -mb-2 text-center">Tank</p>
                                        <div class="divider divider-vertical mt-1 px-3"></div>
                                        <div class="grid grid-cols-1">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Tank' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- <ul class="flex flex-col -mt-4" role="list">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Tank' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </ul> --}}
                                    </div>

                                    {{-- Healer List --}}
                                    <div class="shadow-xl rounded-box bg-base-200">
                                        <p class="menu-title text-2xl mt-1 -mb-2">Healer</p>
                                        <div class="divider divider-vertical mt-1 px-3"></div>
                                        <div class="grid grid-cols-1">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Healer' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- <ul class="flex flex-col -mt-4" role="list">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Healer' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </ul> --}}
                                    </div>

                                    {{-- Ranged List --}}
                                    <div class="shadow-xl rounded-box bg-base-200">
                                        <p class="menu-title text-2xl mt-1 -mb-2">Ranged</p>
                                        <div class="divider divider-vertical mt-1 px-3"></div>
                                        <div class="grid grid-cols-1">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Ranged' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- <ul class="flex flex-col -mt-4" role="list">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Ranged' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </ul> --}}
                                    </div>

                                    {{-- Melee List --}}
                                    <div class="shadow-xl rounded-box bg-base-200">
                                        <p class="menu-title text-2xl mt-1 -mb-2">Melee</p>
                                        <div class="divider divider-vertical mt-1 px-3"></div>
                                        <div class="grid grid-cols-1">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Melee' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- <ul class="flex flex-col -mt-4" role="list">
                                            @foreach ($boss->players as $player)
                                                @if ($player->pivot->role === 'Melee' && $player->user_id == auth()->user()->id)
                                                    @include('livewire.includes.roster-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </ul> --}}
                                    </div>
                                </div>

                                {{-- Second Row Lists --}}
                                <div class="2xl:col-span-4 grid grid-cols-1 2xl:grid-cols-4 gap-4">

                                    {{-- Core Raiders Table --}}
                                    <div class="rounded-box bg-base-200 shadow-xl col-span-2">
                                        <p class="menu-title text-2xl text-center">Core Raiders</p>
                                        <div class="divider divider-vertical mt-[1px]"></div>
                                        <div class="grid grid-cols-5 -mt-4">
                                            @foreach ($playersQuery as $player)
                                                @if (
                                                    $player &&
                                                        ($player->rank === 'Raider' ||
                                                            (preg_match('/^Raider/', $player->rank) &&
                                                                !preg_match('/^RaiderInRoster.*X' . preg_quote($boss->positionInRaid) . '/', $player->rank))))
                                                    @include('livewire.includes.single-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Trials Table --}}
                                    <div class="rounded-box bg-base-200 shadow-xl col-span-1">
                                        <p class="menu-title text-2xl text-center rounded-box">Trials</p>
                                        <div class="divider divider-vertical mt-[1px]"></div>
                                        <div class="grid grid-cols-2 -mt-4">
                                            @foreach ($playersQuery as $player)
                                                @if (
                                                    $player &&
                                                        ($player->rank === 'Trial' ||
                                                            (preg_match('/^Trial/', $player->rank) &&
                                                                !preg_match('/^TrialInRoster.*X' . preg_quote($boss->positionInRaid) . '/', $player->rank))))
                                                    @include('livewire.includes.single-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Away Table --}}
                                    <div class="rounded-box bg-base-200 shadow-xl col-span-1">
                                        <p class="menu-title text-2xl text-center rounded-box">Away</p>
                                        <div class="divider divider-vertical mt-[1px]"></div>
                                        <div class="grid grid-cols-2 -mt-4">
                                            @foreach ($playersQuery as $player)
                                                @if (
                                                    $player &&
                                                        ($player->rank === 'Away' ||
                                                            (preg_match('/^Away/', $player->rank) &&
                                                                !preg_match('/^AwayInRoster.*X' . preg_quote($boss->positionInRaid) . '/', $player->rank))))
                                                    @include('livewire.includes.single-lists', [
                                                        'boss' => $boss,
                                                        'player' => $player,
                                                    ])
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                @endforeach
            @else
                <!-- if null -->
                <tr>
                    <th>No bosses found</th>
                </tr>
                </tbody>
            @endunless
        </div>

        {{-- Right Side of the Page --}}
        <div class="2xl:col-span-3 flex flex-col gap-4">

            {{-- Add a Player --}}
            <div class="collapse collapse-open bg-base-100">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Add a new player
                </div>
                <div class="collapse-content">
                    <form wire:submit.prevent="storePlayer">
                        @csrf

                        <div class="form-control">
                            <table>
                                <tr>
                                    <label class="label">
                                        <span class="label-text text-[16px] text-white opacity-80">Name</span>
                                    </label>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="playerName" type="text" wire:model="playerAddForm.playerName"
                                            class="input input-bordered" />
                                        @error('playerAddForm.playerName')
                                            <p class="text-red-500 text-xs mt-1">The player name field needs to be
                                                filled.</p>
                                        @enderror
                                    </td>

                                    <td>
                                        <select id="playerId" wire:model="playerAddForm.rank" class="select">
                                            <option value="Raider">Raider</option>
                                            <option value="Trial">Trial</option>
                                            <option value="Social">Social</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-control mt-6">
                            <button class="btn btn-primary" type="submit" onclick="clearPlayerName()">Create</button>
                        </div>
                    </form>

                </div>
            </div>

            {{-- Add a Character --}}
            <div class="collapse collapse-open bg-base-100 h-[345px]">
                <input type="checkbox" />
                <div class="collapse-title text-xl font-medium">
                    Create a new character
                </div>
                <div class="collapse-content">
                    <form wire:submit="storeCharacter">
                        @csrf

                        <table>
                            <tr>
                                <td>
                                    For player:
                                </td>
                                <td>
                                    <select id="playerCharId" wire:model="characterForm.playerId"
                                        class="select ml-2 mt-[1px]">
                                        <option selected>Select player</option>
                                        @foreach ($playersQuery as $player)
                                            <option value="{{ $player->id }}">{{ $player->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-[16px] text-white opacity-80">Name</span>
                            </label>
                            <input id="charName" type="text" wire:model="characterForm.characterName"
                                value="{{ old('characterForm.characterName') }}" class="input input-bordered" />
                            @error('characterForm.characterName')
                                <p class="text-red-500 text-xs mt-1">The character name field needs to be filled.</p>
                            @enderror
                        </div>

                        @include('livewire.includes.class-spec-select')

                        <div class="form-control mt-6">
                            <button class="btn btn-primary" type="submit"
                                onClick = "clearCharName()">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function clearPlayerName() {
        const playerName = document.getElementById("playerName");
        playerName.value = "";

        const selectElement = document.getElementById("playerId");
        selectElement.selectedIndex = 0;
    }

    function clearCharName() {
        const charName = document.getElementById("charName");
        charName.value = "";

        const selectElement = document.getElementById("playerCharId");
        selectElement.selectedIndex = 0;
        const selectElementClass = document.getElementById("classSelect");
        selectElementClass.selectedIndex = 0;
        const selectElementSpec = document.getElementById("specSelect");
        selectElementSpec.selectedIndex = -1;
    }
</script>
