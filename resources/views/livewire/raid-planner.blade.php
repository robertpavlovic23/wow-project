<div>
    @include('livewire.includes.flash-message')
    @unless (count($bossesQuery) == 0)
        @foreach ($bossesQuery as $boss)
            <div class="collapse overflow-visible collapse-plus bg-base-100 shadow-xl">
                <input type="checkbox" checked />
                <div class="collapse-title text-xl font-medium">{{ $boss->name }}</div>
                <div class="collapse-content">
                    <div class="grid grid-cols-1 2xl:grid-cols-4 gap-16">
                        {{-- Table Boss --}}
                        <div class="2xl:col-span-4 grid grid-cols-1 2xl:grid-cols-4 rounded gap-4">
                            {{-- Tank List --}}
                            <div class="shadow-xl rounded-box list bg-base-200">
                                <p class="menu-title text-2xl mt-1 -mb-2">Tank</p>
                                <div class="divider divider-vertical mt-1 px-3"></div>
                                <ul class="flex flex-col -mt-4" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->pivot->role === 'Tank' && $player->user_id == auth()->user()->id)
                                            @include('livewire.includes.roster-lists', [
                                                'boss' => $boss,
                                                'player' => $player,
                                            ])
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Healer List --}}
                            <div class="shadow-xl rounded-box list bg-base-200">
                                <p class="menu-title text-2xl mt-1 -mb-2">Healer</p>
                                <div class="divider divider-vertical mt-1 px-3"></div>
                                <ul class="flex flex-col -mt-4" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->pivot->role === 'Healer' && $player->user_id == auth()->user()->id)
                                            @include('livewire.includes.roster-lists', [
                                                'boss' => $boss,
                                                'player' => $player,
                                            ])
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Ranged List --}}
                            <div class="shadow-xl rounded-box list bg-base-200">
                                <p class="menu-title text-2xl mt-1 -mb-2">Ranged</p>
                                <div class="divider divider-vertical mt-1 px-3"></div>
                                <ul class="flex flex-col -mt-4" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->pivot->role === 'Ranged' && $player->user_id == auth()->user()->id)
                                            @include('livewire.includes.roster-lists', [
                                                'boss' => $boss,
                                                'player' => $player,
                                            ])
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Melee List --}}
                            <div class="shadow-xl rounded-box list bg-base-200">
                                <p class="menu-title text-2xl mt-1 -mb-2">Melee</p>
                                <div class="divider divider-vertical mt-1 px-3"></div>
                                <ul class="flex flex-col -mt-4" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->pivot->role === 'Melee' && $player->user_id == auth()->user()->id)
                                            @include('livewire.includes.roster-lists', [
                                                'boss' => $boss,
                                                'player' => $player,
                                            ])
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="2xl:col-span-4 grid grid-cols-1 2xl:grid-cols-2 gap-4">

                            {{-- Core Raiders Table --}}
                            <div class="rounded-box bg-base-200 shadow-xl pb-4">
                                <p class="menu-title text-2xl text-center">Core Raiders</p>
                                <div class="divider divider-vertical mt-[1px]"></div>
                                <table class="w-full text-center">
                                    @for ($i = 0; $i < count($playersQuery) / 4; $i++)
                                        <tr class="rounded-box cursor-pointer">
                                            @for ($j = 0; $j < 4; $j++)
                                                @php
                                                    $index = $i * 4 + $j; // Calculated the index in the $playersQuery array
                                                    $player = $playersQuery[$index] ?? null; // Get the player at that index
                                                @endphp

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
                                            @endfor
                                        </tr>
                                    @endfor
                                </table>
                            </div>

                            {{-- Trials Table --}}
                            <div class="rounded-box bg-base-200 shadow-xl pb-4">
                                <p class="menu-title text-2xl text-center rounded-box">Trials</p>
                                <div class="divider divider-vertical mt-[1px]"></div>
                                <table class="w-full text-center">
                                    @for ($i = 0; $i < count($playersQuery) / 4; $i++)
                                        <tr class="rounded-box cursor-pointer divide-x-2 divide-base-200 border-base-200">
                                            @for ($j = 0; $j < 5; $j++)
                                                @php
                                                    $index = $i * 5 + $j; // Calculated the index in the $playersQuery array
                                                    $player = $playersQuery[$index] ?? null; // Get the player at that index
                                                @endphp

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
                                            @endfor
                                        </tr>
                                    @endfor
                                </table>
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
