<div>
    @unless (count($bossesQuery) == 0)
        @foreach ($bossesQuery as $boss)
            <div class="collapse overflow-visible collapse-plus bg-base-100">
                <input type="checkbox" checked />
                <div class="collapse-title text-xl font-medium">{{ $boss->name }}</div>
                <div class="collapse-content">
                    <div class="grid grid-cols-1 2xl:grid-cols-4 gap-16">
                        {{-- Table Boss --}}
                        <div class="2xl:col-span-2 grid grid-cols-1 2xl:grid-cols-4 rounded gap-4">
                            {{-- Tank List --}}
                            <div class=" shadow-xl 2xl:col-span-1 h-full relative">
                                <p class="menu-title text-2xl">Tank</p>
                                <div class="divider divider-vertical mt-1"></div>
                                <ul class="w-full h-full flex flex-col overflow-y-auto scroll-style-1" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->character_role == 'Tank')
                                            <li
                                                class="w-full text-xl flex group/item justify-between rounded-lg hover:bg-gray-700 py-2 pl-2 cursor-pointer">
                                                <a class="w-full leading-6"
                                                    wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>
                                                <a class="group/edit invisible transition group-hover/item:visible">
                                                    <div class="dropdown dropdown-bottom flex justify-end absolute right-2 -mt-[2px]">
                                                        <label tabindex="0"
                                                            class="btn btn-circle btn-ghost btn-xs text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        <div tabindex="0"
                                                            class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
                                                            <div class="card-body">

                                                                {{-- Characters --}}
                                                                <summary class="text-gray-500 text-xl -mt-4">
                                                                    <a>Characters</a>
                                                                </summary>
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    @foreach ($player->characters as $character)
                                                                        <li
                                                                            class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">

                                                                            <a class="w-full"
                                                                                wire:click.prevent="updatePlayer({{ $player->id }}, '{{ $character->role }}')">
                                                                                {{ $character->class }}
                                                                            </a>

                                                                            {{-- <a href="/raid-planner/update/{{ $player->id }}/{{ $character->role }}">{{$character->class}}</a> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="divider divider-vertical">Options</div>
                                                                {{-- Remove --}}
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full">Edit</a>
                                                                    </li>
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full"
                                                                            wire:click.prevent="deletePlayer({{ $player->id }})">Remove</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Healer List --}}
                            <div class=" shadow-xl 2xl:col-span-1 h-full relative">
                                <p class="menu-title text-2xl">Healer</p>
                                <div class="divider divider-vertical mt-1"></div>
                                <ul class="w-full h-full flex flex-col overflow-y-auto scroll-style-1" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->character_role == 'Healer')
                                            <li
                                                class="w-full text-xl flex group/item justify-between rounded-lg hover:bg-gray-700 py-2 pl-2 cursor-pointer">
                                                <a class="w-full leading-6"
                                                    wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>
                                                <a class="group/edit invisible transition group-hover/item:visible">
                                                    <div class="dropdown dropdown-bottom flex justify-end absolute right-2 -mt-[2px]">
                                                        <label tabindex="0"
                                                            class="btn btn-circle btn-ghost btn-xs text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        <div tabindex="0"
                                                            class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
                                                            <div class="card-body">

                                                                {{-- Characters --}}
                                                                <summary class="text-gray-500 text-xl -mt-4">
                                                                    <a>Characters</a>
                                                                </summary>
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    @foreach ($player->characters as $character)
                                                                        <li
                                                                            class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">

                                                                            <a class="w-full"
                                                                                wire:click.prevent="updatePlayer({{ $player->id }}, '{{ $character->role }}')">
                                                                                {{ $character->class }}
                                                                            </a>

                                                                            {{-- <a href="/raid-planner/update/{{ $player->id }}/{{ $character->role }}">{{$character->class}}</a> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="divider divider-vertical">Options</div>
                                                                {{-- Remove --}}
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full">Edit</a>
                                                                    </li>
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full"
                                                                            wire:click.prevent="deletePlayer({{ $player->id }})">Remove</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Ranged List --}}
                            <div class=" shadow-xl 2xl:col-span-1 h-full relative">
                                <p class="menu-title text-2xl">Ranged</p>
                                <div class="divider divider-vertical mt-1"></div>
                                <ul class="w-full h-full flex flex-col overflow-y-auto scroll-style-1" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->character_role == 'Ranged')
                                            <li
                                                class="w-full text-xl flex group/item justify-between rounded-lg hover:bg-gray-700 py-2 pl-2 cursor-pointer">
                                                <a class="w-full leading-6"
                                                    wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>
                                                <a class="group/edit invisible transition group-hover/item:visible">
                                                    <div class="dropdown dropdown-bottom flex justify-end absolute right-2 -mt-[2px]">
                                                        <label tabindex="0"
                                                            class="btn btn-circle btn-ghost btn-xs text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        <div tabindex="0"
                                                            class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
                                                            <div class="card-body">

                                                                {{-- Characters --}}
                                                                <summary class="text-gray-500 text-xl -mt-4">
                                                                    <a>Characters</a>
                                                                </summary>
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    @foreach ($player->characters as $character)
                                                                        <li
                                                                            class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">

                                                                            <a class="w-full"
                                                                                wire:click.prevent="updatePlayer({{ $player->id }}, '{{ $character->role }}')">
                                                                                {{ $character->class }}
                                                                            </a>

                                                                            {{-- <a href="/raid-planner/update/{{ $player->id }}/{{ $character->role }}">{{$character->class}}</a> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="divider divider-vertical">Options</div>
                                                                {{-- Remove --}}
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full">Edit</a>
                                                                    </li>
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full"
                                                                            wire:click.prevent="deletePlayer({{ $player->id }})">Remove</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Melee List --}}
                            <div class=" shadow-xl 2xl:col-span-1 h-full relative">
                                <p class="menu-title text-2xl">Melee</p>
                                <div class="divider divider-vertical mt-1"></div>
                                <ul class="w-full h-full flex flex-col overflow-y-auto scroll-style-1" role="list">
                                    @foreach ($boss->players as $player)
                                        @if ($player->character_role == 'Melee')
                                            <li
                                                class="w-full text-xl flex group/item justify-between rounded-lg hover:bg-gray-700 py-2 pl-2 cursor-pointer">
                                                <a class="w-full leading-6"
                                                    wire:click.prevent="removePlayer({{ $boss->id }}, {{ $player->id }})">{{ $player->name }}</a>
                                                <a class="group/edit invisible transition group-hover/item:visible">
                                                    <div class="dropdown dropdown-bottom flex justify-end absolute right-2 -mt-[2px]">
                                                        <label tabindex="0"
                                                            class="btn btn-circle btn-ghost btn-xs text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        <div tabindex="0"
                                                            class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
                                                            <div class="card-body">

                                                                {{-- Characters --}}
                                                                <summary class="text-gray-500 text-xl -mt-4">
                                                                    <a>Characters</a>
                                                                </summary>
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    @foreach ($player->characters as $character)
                                                                        <li
                                                                            class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">

                                                                            <a class="w-full"
                                                                                wire:click.prevent="updatePlayer({{ $player->id }}, '{{ $character->role }}')">
                                                                                {{ $character->class }}
                                                                            </a>

                                                                            {{-- <a href="/raid-planner/update/{{ $player->id }}/{{ $character->role }}">{{$character->class}}</a> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="divider divider-vertical">Options</div>
                                                                {{-- Remove --}}
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full">Edit</a>
                                                                    </li>
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full"
                                                                            wire:click.prevent="deletePlayer({{ $player->id }})">Remove</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Players List Core --}}
                        <div class="rounded-box bg-base-100 shadow-xl pb-4">
                            <div class="max-h-full relative">
                                <p class="menu-title text-2xl bg-base-100">Core Raiders</p>
                                <div class="divider divider-vertical mt-1"></div>
                                <ul class="w-full h-full flex flex-col overflow-y-auto scroll-style-1" role="list">
                                    @foreach ($playersQuery as $player)
                                        @if ($player->rank === 'Raider')
                                            <li
                                                class="w-full text-xl flex group/item justify-between rounded-lg hover:bg-gray-700 py-1 pl-4 cursor-pointer">
                                                <a class="w-full leading-6"
                                                    wire:click.prevent="insertPlayer({{ $boss->id }}, {{ $player->id }})">
                                                    {{ $player->name }}
                                                </a>
                                                <a class="group/edit invisible transition group-hover/item:visible">
                                                    <div class="dropdown dropdown-bottom flex justify-end absolute right-2 -mt-[3px]">
                                                        <label tabindex="0"
                                                            class="btn btn-circle btn-ghost btn-xs text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        <div tabindex="0"
                                                            class="card compact dropdown-content w-64 shadow bg-base-200 rounded-box z-50">
                                                            <div class="card-body">

                                                                {{-- Characters --}}
                                                                <summary class="text-gray-500 text-xl -mt-4">
                                                                    <a>Characters</a>
                                                                </summary>
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    @foreach ($player->characters as $character)
                                                                        <li
                                                                            class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">

                                                                            <a class="w-full"
                                                                                wire:click.prevent="updatePlayer({{ $player->id }}, '{{ $character->role }}')">
                                                                                {{ $character->class }}
                                                                            </a>

                                                                            {{-- <a href="/raid-planner/update/{{ $player->id }}/{{ $character->role }}">{{$character->class}}</a> --}}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <div class="divider divider-vertical">Options</div>
                                                                {{-- Remove --}}
                                                                <ul class="flex flex-col border-l border-gray-700 pl-1">
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full">Edit</a>
                                                                    </li>
                                                                    <li
                                                                        class="flex ml-2 hover:bg-base-100 hover:rounded-lg text-base cursor-pointer">
                                                                        <a class="w-full"
                                                                            wire:click.prevent="deletePlayer({{ $player->id }})">Remove</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- Players List Trials --}}
                        <ul class="menu overflow-hidden shadow-xl h-72" role="list">
                            <li class="menu-title text-2xl">Trials</li>
                            @foreach ($playersQuery as $player)
                                @if ($player->rank === 'Trial')
                                    <li class="group/item relative flex justify-between rounded-xl hover:bg-base-500">
                                        <div class="flex">
                                            <div class="w-full text-sm leading-6">
                                                <a href="#"
                                                    wire:click.prevent="insertPlayer({{ $boss->id }}, {{ $player->id }})">
                                                    <span class="absolute inset-0 rounded-xl" aria-hidden="true"></span>
                                                    {{ $player->name }}
                                                </a>
                                            </div>
                                            <a class="group/edit invisible transition group-hover/item:visible">
                                                <div class="dropdown w-2 flex justify-end">
                                                    <label tabindex="0"
                                                        class="btn btn-circle btn-ghost btn-xs text-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                    </label>
                                                    <div tabindex="0"
                                                        class="card compact dropdown-content z-[1] shadow bg-base-100 rounded-box w-64">
                                                        <div class="card-body">
                                                            <h2 class="card-title">You needed more info?</h2>
                                                            <p>Here is a description!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

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
